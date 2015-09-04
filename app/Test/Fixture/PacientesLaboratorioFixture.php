<?php
/**
 * PacientesLaboratorioFixture
 *
 */
class PacientesLaboratorioFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'paciente_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'laboratorio_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'hacer' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 1, 'unsigned' => false),
		'hecho' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 1, 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'moidified' => array('type' => 'datetime', 'null' => true, 'default' => null),
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
			'laboratorio_id' => 1,
			'hacer' => 1,
			'hecho' => 1,
			'created' => '2015-08-20 00:49:21',
			'moidified' => '2015-08-20 00:49:21'
		),
	);

}
