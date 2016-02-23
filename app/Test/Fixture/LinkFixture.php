<?php
/**
 * Link Fixture
 */
class LinkFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'link' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'used' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'created_on' => array('type' => 'timestamp', 'null' => false, 'default' => null),
		'indexes' => array(
			
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'link' => 'Lorem ipsum dolor sit amet',
			'used' => 1,
			'created_on' => 1444189929
		),
	);

}
