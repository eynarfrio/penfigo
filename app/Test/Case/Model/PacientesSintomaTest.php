<?php
App::uses('PacientesSintoma', 'Model');

/**
 * PacientesSintoma Test Case
 *
 */
class PacientesSintomaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.pacientes_sintoma',
		'app.paciente',
		'app.sintoma'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PacientesSintoma = ClassRegistry::init('PacientesSintoma');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PacientesSintoma);

		parent::tearDown();
	}

}
