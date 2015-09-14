<?php
App::uses('PacientesResultado', 'Model');

/**
 * PacientesResultado Test Case
 *
 */
class PacientesResultadoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.pacientes_resultado',
		'app.paciente',
		'app.resultado',
		'app.examene'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PacientesResultado = ClassRegistry::init('PacientesResultado');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PacientesResultado);

		parent::tearDown();
	}

}
