<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

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
		$this->Auth->allow('registration','logout','noAccess');
	}
	public function login() {
		$this->layout = "login";
	    if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	            return $this->redirect($this->Auth->redirectUrl());
	        }
					$this->Session->setFlash('Invalid username or password, try again', 'flash_error');
	    }
	}

	public function logout() {
	    return $this->redirect($this->Auth->logout());
	}
	public function index() {
		if(AuthComponent::user('role_id') == 1){
			$this->User->recursive = 0;
			$this->set('users', $this->Paginator->paginate());
			$this->render('index');
		}else{
			throw new NotFoundException(__('Your are not allowed to view the page'));
		}

	}
	public function dashboard() {
		$id = AuthComponent::user('id');
		//$this->Paginator->settings = array('conditions'=>array('User.wholeseller_id'=>$id));
		$this->set('page_title', 'Dashboard');
		//$this->set('agents',$this->Paginator->paginate('User'));

		$this->loadModel('Product');
		$products = $this->Product->find('all',array('conditions'=>array('Product.isActive'=> true)));
		$this->set('products', $products);

		$this->loadModel('Order');
		$orders = $this->Order->find('all',array('conditions'=>array('Order.user_id'=> $id)));
		$this->set('orders', $orders);

	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));

		$this->User->recursive = 0;
		$this->Paginator->settings = array('conditions'=>array('User.wholeseller_id'=>$id));
		$this->set('agents', $this->Paginator->paginate());
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			if(!empty($this->data['User']['copy']['name']))
			{
				$file = $this->request->data['User']['copy']; //put the data into a var for easy use
				$ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
				$arr_ext = array('jpg', 'jpeg', 'pdf'); //set allowed extensions
				//only process if the extension is valid
				if(in_array($ext, $arr_ext))
				{
						$file['name'] = $this->data['User']['username'];
						move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/details/' . $file['name']);
						$this->request->data['User']['copy'] = 'details/'.$file['name'];

						if ($this->User->save($this->request->data)) {
		            $this->Session->setFlash('Account has been successfully saved', 'flash_success');
		            return $this->redirect(array('action' => 'index'));
		        } else {
		          $this->Session->setFlash('Your account could not be saved', 'flash_error');
		        }
				}
			}
		}
		$states = $this->User->State->find('list');
		$roles = $this->User->Role->find('list');
		$this->set(compact('districts', 'states', 'roles'));
	}

	public function addAgents($id = null, $agent = null){
		if($this->request->is('post','put')){
			$data = $this->User->findById($this->request->named['agent']);
			$data['User']['wholeseller_id'] = $this->request->named['wholeseller'];

			if($this->User->save($data['User']))
			{
				$this->Session->setFlash('Agent has been successfully assigned', 'flash_success');
				$this->redirect(array('action'=>'view', $this->request->named['wholeseller']));
			}else{
				$this->Session->setFlash('Agent could not be assigned. Please try again', 'flash_error');
			}
		}
			$this->User->recursive = 0;
			$this->Paginator->settings = array('conditions'=>array('User.role_id'=> 5, 'User.wholeseller_id'=> null));
			$this->set('agents', $this->Paginator->paginate());
			$this->set('wholeseller',$id);
	}

	public function registration($link) {
		$this->layout = "regis";
		$this->loadModel('Link');
		$check = $this->Link->find('first',array('conditions'=>array('Link.link' => $link, 'Link.isUsed' => 0)));
		if($check != null){
			if ($this->request->is('post')) {
				if(!empty($this->data['User']['copy']['name']))
				{
					$file = $this->request->data['User']['copy']; //put the data into a var for easy use
					$ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
					$arr_ext = array('jpg', 'jpeg', 'pdf'); //set allowed extensions
					//only process if the extension is valid
					if(in_array($ext, $arr_ext))
					{
							$file['name'] = $this->data['User']['username'];
							move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/details/' . $file['name']);
							$this->request->data['User']['copy'] = 'details/'.$file['name'];

							if ($this->User->save($this->request->data)) {
									$check['Link']['isUsed'] = 1;
									$this->Link->save($check['Link']);
			            $this->Session->setFlash('Your account has been successfully saved. Please login using your details', 'flash_success');
			            return $this->redirect(array('action' => 'login'));
			        } else {
			            $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			        }
					}
				}
			}
		$role_id = 5;
		}else{
			$this->redirect(array('action'=>'noAccess'));
		}

 		$states = $this->User->State->find('list');
		$this->set(compact('districts', 'states', 'role_id'));
	}
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			//validate username
			$check = $this->User->findByUsername($this->request->data['username']);
			if($check==null){
				$this->User->validator()->remove('username','isUnique');
			}

			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('Your account has been successfully saved', 'flash_success');
				return $this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash('The user could not be saved. Please, try again', 'flash_error');
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$states = $this->User->State->find('list');
		$roles = $this->User->Role->find('list');
		$this->set(compact('districts', 'states', 'roles'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
				$this->Session->setFlash('Account has been deleted', 'flash_error');
		} else {
			$this->Session->setFlash('The user could not be deleted. Please, try again.','flash_error');
		}
		return $this->redirect(array('action' => 'index'));
	}
	public function generateLink(){
		$unique_id = uniqid();
		$this->loadModel('Link');
		$this->Link->create();
		$data['link'] = $unique_id;
		$data['used'] = false;
		$this->Link->save($data);
		$this->set('id',$unique_id);
	}
	public function noAccess(){
		$this->layout = "no_access";
	}
}
