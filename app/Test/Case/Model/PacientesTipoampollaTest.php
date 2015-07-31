<?php
App::uses('PacientesTipoampolla', 'Model');

/**
 * PacientesTipoampolla Test Case
 *
 */
class PacientesTipoampollaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.pacientes_tipoampolla',
		'app.areaampolla',
		'app.area',
		'app.paciente',
		'app.medico',
		'app.user',
		'app.tipoampolla'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PacientesTipoampolla = ClassRegistry::init('PacientesTipoampolla');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PacientesTipoampolla);

		parent::tearDown();
	}

}
