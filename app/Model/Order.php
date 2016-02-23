<?php
App::uses('AppModel', 'Model');
/**
 * Order Model
 *
 * @property User $User
 * @property Product $Product
 */
class Order extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'transaction_number';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $hasOne = array(
		'Payment'=>array(
			'className'=>'Payment',
			'foreignKey' => false,
			'conditions' => array('`Order`.`transaction_number`=`Payment`.`transaction_number`'),
			'fields' => '',
			'order' => ''
		)
	);
}
