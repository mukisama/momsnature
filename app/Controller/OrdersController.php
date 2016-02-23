<?php
App::uses('AppController', 'Controller');
/**
 * Orders Controller
 *
 * @property Order $Order
 * @property PaginatorComponent $Paginator
 */
class OrdersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','RequestHandler');
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
		$this->Order->recursive = 0;
		$this->Paginator->settings = array('conditions'=>array('Order.user_id'=>AuthComponent::user('id')));
		$this->set('orders', $this->Paginator->paginate());
	}

	public function admin_view() {

		if(AuthComponent::user('role_id') == 1){
			$this->Order->recursive = 0;
			$this->set('orders', $this->Paginator->paginate());
		}else{
			$this->Session->setFlash('Your are not allowed to view the page', 'flash_error');
		}

	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
		$order = $this->Order->find('first', array('conditions' => array('Order.' . $this->Order->primaryKey => $id)));
		$this->set('order', $order);
		$this->loadModel('Item');
		$items = $this->Item->find('all', array('conditions' => array('Item.transaction_number'=>$order['Order']['transaction_number'] )));
		$this->set('items', $items);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Order->create();
			if ($this->Order->save($this->request->data)) {
				$this->Flash->success(__('The order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The order could not be saved. Please, try again.'));
			}
		}
		$users = $this->Order->User->find('list');
		$this->set(compact('users', 'products'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Order->save($this->request->data)) {
				$this->Flash->success(__('The order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The order could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
			$this->request->data = $this->Order->find('first', $options);
		}
		$users = $this->Order->User->find('list');
		$this->set(compact('users', 'products'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Order->delete()) {
			$this->Flash->success(__('The order has been deleted.'));
		} else {
			$this->Flash->error(__('The order could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function viewReceipt($tn = null) {
		ini_set('memory_limit', '512M');
		$order = $this->Order->find('first', array('conditions' => array('Order.transaction_number' => $tn)));
		$this->set('order', $order);
		$this->loadModel('Item');
		$items = $this->Item->find('all', array('conditions' => array('Item.transaction_number'=>$order['Order']['transaction_number'] )));
		$this->set('items', $items);
	}
}
