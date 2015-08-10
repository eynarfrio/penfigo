<?php
App::uses('PacientesMedico', 'Model');

/**
 * PacientesMedico Test Case
 *
 */
class PacientesMedicoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.pacientes_medico',
		'app.paciente',
		'app.medico',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PacientesMedico = ClassRegistry::init('PacientesMedico');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PacientesMedico);

		parent::tearDown();
	}

}
