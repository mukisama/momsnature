<?php
App::uses('AppController', 'Controller');

class DistrictsController extends AppController {
	public function getByState() {
		$state_id = $this->request->data['User']['state_id'];

		$districts = $this->District->find('list', array(
		'conditions' => array('District.state_id' => $state_id),
		'recursive' => -1
		));

		$this->set('districts',$districts);
		$this->layout = 'ajax';
	}
}
