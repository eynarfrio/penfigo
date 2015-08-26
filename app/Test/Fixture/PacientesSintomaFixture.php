<?php
/**
 * PacientesSintomaFixture
 *
 */
class PacientesSintomaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'numero' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'paciente_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'sintoma_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'estado' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 1, 'unsigned' => false),
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
			'numero' => 1,
			'paciente_id' => 1,
			'sintoma_id' => 1,
			'estado' => 1,
			'created' => '2015-07-16 13:27:11',
			'modified' => '2015-07-16 13:27:11'
		),
	);

}
