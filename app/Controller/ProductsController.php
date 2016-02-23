<?php
App::uses('AppController', 'Controller');
/**
 * Products Controller
 *
 * @property Product $Product
 * @property PaginatorComponent $Paginator
 */
class ProductsController extends AppController {

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
		$this->Product->recursive = 0;
		$this->set('products', $this->Paginator->paginate());
	}

	public function catalogue() {
		$this->Product->recursive = 0;
		$this->Paginator->settings = array('conditions'=>array('Product.isActive' => true ));
		$this->set('products', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
		$this->set('product', $this->Product->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			if(!empty($this->data['Product']['pictures']['name']))
			{
				$file = $this->request->data['Product']['pictures']; //put the data into a var for easy use
				$ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
				$arr_ext = array('png','jpg', 'jpeg'); //set allowed extensions
				//only process if the extension is valid
				if(in_array($ext, $arr_ext))
				{
						$file['name'] = $this->request->data['Product']['SKU'];
						move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/products/' . $file['name']);
						$this->request->data['Product']['pictures'] = 'products/'.$file['name'];
						if ($this->Product->save($this->request->data)) {
		            $this->Session->setFlash('Item successfully saved', 'flash_success');
		            return $this->redirect(array('action' => 'index'));
		        } else {
		            $this->Session->setFlash('Sorry, item could not be saved', 'flash_error');
		        }
				}
			}
		}
		$categories = $this->Product->Category->find('list');
		$types = $this->Product->Type->find('list');
		$this->set(compact('categories', 'types'));
}
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if($this->request->data['Product']['isActive']==null){
				$this->request->data['Product']['isActive'] = false;
			}
			if (empty($this->request->data['Product']['pictures']['name'])) {
			   unset($this->request->data['Product']['pictures']);
			}else{
					$file = $this->request->data['Product']['pictures']; //put the data into a var for easy use
					$ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
					$arr_ext = array('png','jpg', 'jpeg'); //set allowed extensions
					//only process if the extension is valid
					if(in_array($ext, $arr_ext))
					{
							//do the actual uploading of the file. First arg is the tmp name, second arg is
							//where we are putting it
							move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/products/' . $file['name']);

							//prepare the filename for database entry
							$this->request->data['Product']['pictures'] = 'products/'.$file['name'];
							/*if ($this->Product->save($this->request->data)) {
									$this->Session->setFlash(__('The products has been saved.'));
									return $this->redirect(array('action' => 'index'));
							} else {
									$this->Session->setFlash(__('The category could not be saved. Please, try again.'));
							}*/
					}
			}
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash('Item successfully saved', 'flash_success');
				return $this->redirect(array('action' => 'index'));
			}else{
				$this->Session->setFlash('Sorry, item could not be saved', 'flash_error');
			}
		} else {
			$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
			$this->request->data = $this->Product->find('first', $options);
		}
		$categories = $this->Product->Category->find('list');
		$types = $this->Product->Type->find('list');
		$this->set(compact('categories', 'types'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Product->delete()) {
			$this->Flash->success(__('The product has been deleted.'));
		} else {
			$this->Flash->error(__('The product could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
