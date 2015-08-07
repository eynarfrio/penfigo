<?php
App::uses('PacientesPielsintoma', 'Model');

/**
 * PacientesPielsintoma Test Case
 *
 */
class PacientesPielsintomaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.pacientes_pielsintoma',
		'app.paciente',
		'app.pielsintoma',
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
		$this->PacientesPielsintoma = ClassRegistry::init('PacientesPielsintoma');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PacientesPielsintoma);

		parent::tearDown();
	}

}
