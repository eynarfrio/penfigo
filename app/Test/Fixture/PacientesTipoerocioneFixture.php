<?php
/**
 * PacientesTipoerocioneFixture
 *
 */
class PacientesTipoerocioneFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'tipoerocione_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'areaampolla_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'estado' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 1, 'unsigned' => false),
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
			'tipoerocione_id' => 1,
			'areaampolla_id' => 1,
			'estado' => 1,
			'created' => '2015-07-26 19:56:20',
			'modified' => '2015-07-26 19:56:20'
		),
	);

}
