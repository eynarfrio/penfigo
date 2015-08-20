<?php
/**
 * PenfigosintomaFixture
 *
 */
class PenfigosintomaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'pielsintomas_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'penfigo_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'id' => 1,
			'pielsintomas_id' => 1,
			'penfigo_id' => 1,
			'created' => '2015-07-26 23:19:22',
			'modified' => '2015-07-26 23:19:22'
		),
	);

}
