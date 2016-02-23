<?php
App::uses('AppController', 'Controller');

class CartsController extends AppController {

	public $uses = array('Product','Cart');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('');
	}
	public function add() {
		$this->autoRender = false;
		if ($this->request->is('post')) {

			$this->Cart->addProduct($this->request->data['Cart']['product_id']);
		}
		echo $this->Cart->getCount();
	}

	public function view() {
		$carts = $this->Cart->readProduct();
		$products = array();
		if (null!=$carts) {
			foreach ($carts as $productId => $count) {
				$product = $this->Product->read(null,$productId);
				$product['Product']['count'] = $count;
				$products[]=$product;
			}
		}
		$this->set(compact('products'));
	}

	public function update() {
		if ($this->request->is('post')) {
			if (!empty($this->request->data)) {
				$this->loadModel('Item');
				$cart = array();
				foreach ($this->request->data['Cart']['count'] as $index=>$count) {
					if ($count>0) {
						$productId = $this->request->data['Cart']['product_id'][$index];
						$cart[$productId] = $count;
					}
				}
				$this->Cart->saveProduct($cart);
			}
		}
		$this->redirect(array('action'=>'view'));
	}

  public function checkout(){

		$transaction_no = $this->generateTransaction();
		$carts = CakeSession::read('cart');
		CakeSession::write('cart',null);
		$this->loadModel('Item');
		$this->loadModel('Product');
		$total = 0;
		//register items
		foreach($carts as $product_id=>$quantity){
			$this->Item->create();
			$data['transaction_number'] = $transaction_no;
			$data['product_id'] = $product_id;
			$data['quantity'] = $quantity;
			$item = $this->Product->find('first',array('conditions'=>array('Product.id'=>$product_id)));
			$price = $item['Product']['agent_price'];
			$amount = $price*$quantity;
			$data['amount'] = $amount;
			$total = $total + $amount;
			$this->Item->save($data);
		}

		//create new order
		$this->loadModel('Order');
		$this->Order->create();
		$data1['transaction_number'] = $transaction_no;
		$data1['order_status'] ='Pending Payment';
		$data1['user_id'] = AuthComponent::user('id');
		$data1['amount'] = $total;
		if($this->Order->save($data1)){
				//$this->redirect(array('action'=>'payment','?'=>array('id'=>$this->Order->id)));
				$this->Session->setFlash('The order has been created, please choose method of payment','flash_success');
				$this->redirect(array('action'=>'payment', $transaction_no));
		}else {
				$this->Session->setFlash('The order could not be saved. Please check the details.'.'flash_error');
		}
		/*
		$this->loadModel('Item');
		$items = $this->Item->find('all', array('conditions'=>array('Item.product_id'=>$cart, 'Item.order_id'=>1)));
		foreach($items as $item){
			$data['order_id'] = $;
		}
		*/
  }

  public function payment($transaction_no = null)
  {
		$this->loadModel('Order');
		$order = $this->Order->find('first', array('conditions' =>array('Order.transaction_number'=>$transaction_no)));
		$this->set('transaction_no', $order['Order']['transaction_number']);
		$this->set('amount', $order['Order']['amount']);

		$this->loadModel('Payment');
		if($this->request->is('post')){
			//print_r($this->request->data);
			//exit;
			if (empty($this->request->data['Payment']['Attachment']['name'])) {
			   unset($this->request->data['Payment']['Attachment']);
			}else{
					$file = $this->request->data['Payment']['Attachment']; //put the data into a var for easy use
					$ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
					$arr_ext = array('pdf','png','jpg', 'jpeg'); //set allowed extensions
					//only process if the extension is valid
					if(in_array($ext, $arr_ext))
					{
							$file['name'] = $transaction_no;
							move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/receipts/' . $file['name']);
							$this->request->data['Payment']['copy'] = 'receipts/'.$file['name'];
					}
			}
			$this->Payment->create();
			if ($this->Payment->save($this->request->data)) {
				$order = $this->Order->find('first',array('conditions'=>array('Order.transaction_number'=>$this->request->data['Payment']['transaction_number'])));
				$order['Order']['order_status'] = "Processing Payment";
				if($this->Order->save($order)){
					$this->Session->setFlash('Your payment has been sent for processing. Please wait for 3 days for approval', 'flash_success');
					return $this->redirect(array('controller'=>'users','action' => 'dashboard'));
				}
				continue;
			} else {
				$this->Session->setFlash('Payment could not be saved. Please, try again', 'flash_error');
			}
		}
		}

	public function skip_payment($transaction_no = null){
		$this->loadModel('Order');
		$order = $this->Order->find('first', array('conditions' =>array('Order.transaction_number'=>$transaction_no)));
		$order['Order']['order_status'] = "Pending Payment";
		if($this->Order->save($order)){
			$this->Session->setFlash('The order has been saved. Please make payment within 14 days before the order expired','flash_success');
			$this->redirect(array('controller'=>'users','action'=>'dashboard'));
		}else{
			$this->Session->setFlash('The order could not be saved. Please check the details.','flash_error');
		}
	}
	public function generateTransaction()
	{
		$this->autoRender = false;
		$this->loadModel('Order');
		$count = $this->Order->find('count');
		$count = sprintf('%06d', $count);
		$transaction_no = date('Y').date('m')."O".$count;
		return $transaction_no;
	}

}
