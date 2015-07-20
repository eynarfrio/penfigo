<?php
/**
 * PacientesTipoampollaFixture
 *
 */
class PacientesTipoampollaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'areaampolla_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'tipoampolla_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
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
			'areaampolla_id' => 1,
			'tipoampolla_id' => 1,
			'created' => '2015-07-19 20:10:50',
			'modified' => '2015-07-19 20:10:50'
		),
	);

}
