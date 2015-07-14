<?php
/**
 * PacientesMedicoFixture
 *
 */
class PacientesMedicoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'paciente_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'medico_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
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
			'paciente_id' => 1,
			'medico_id' => 1,
			'created' => '2015-07-13 22:52:39',
			'modified' => '2015-07-13 22:52:39'
		),
	);

}
