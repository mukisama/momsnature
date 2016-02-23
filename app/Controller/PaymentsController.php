<?php
App::uses('AppController', 'Controller');
/**
 * Payments Controller
 *
 * @property Payment $Payment
 * @property PaginatorComponent $Paginator
 */
class PaymentsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
 public function beforeFilter() {
	 parent::beforeFilter();
	 $this->Auth->allow('');
 }

	public function index() {
		$this->Payment->recursive = 0;
		$this->set('payments', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Payment->exists($id)) {
			throw new NotFoundException(__('Invalid payment'));
		}
		$options = array('conditions' => array('Payment.' . $this->Payment->primaryKey => $id));
		$this->set('payment', $this->Payment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Payment->create();
			if ($this->Payment->save($this->request->data)) {
				$this->Flash->success(__('The payment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The payment could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Payment->exists($id)) {
			throw new NotFoundException(__('Invalid payment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Payment->save($this->request->data)) {
				$this->Flash->success(__('The payment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The payment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Payment.' . $this->Payment->primaryKey => $id));
			$this->request->data = $this->Payment->find('first', $options);
		}
	}

	public function approve(){
		if($this->request->is('post')){
			$data = $this->Payment->findById($this->request->data['Payment']['id']);
			$data['Payment']['isApproved'] = 1;
			$data['Payment']['receipt_number'] = $this->generateReceipt();
			if($this->Payment->save($data)){
				//update order status
				$this->loadModel('Order');
				$this->Order->recursive = 0;
				$order = $this->Order->findByTransactionNumber($data['Payment']['transaction_number']);
				$order['Order']['order_status'] = "Items Delivered";
				$this->Order->save($order['Order']);

				$this->Session->setFlash('Payment has been approved', 'flash_success');
				return $this->redirect(array('action' => 'index'));
			}else{
				  $this->Session->setFlash('Payment could not be saved', 'flash_error');
			}
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Payment->id = $id;
		if (!$this->Payment->exists()) {
				$this->Session->setFlash('Invalid payment.', 'flash_error');
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Payment->delete()) {
			$this->Session->setFlash('Record has been deleted.', 'flash_success');
		} else {
			$this->Session->setFlash('The record could not be deleted. Please, try again.', 'flash_error');
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function generateReceipt()
	{
		$this->autoRender = false;
		$count = $this->Payment->find('count');
		$count = sprintf('%06d', $count);
		$receipt_no = date('Y').date('m')."R".$count;
		return $receipt_no;
	}

	public function viewReceipt()
	{
		if (!$this->Payment->exists($id)) {
			throw new NotFoundException(__('Invalid payment'));
		}
		$options = array('conditions' => array('Payment.' . $this->Payment->primaryKey => $id));
		$this->set('payment', $this->Payment->find('first', $options));
	}
}
