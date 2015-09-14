<?php
App::uses('PacientesLaboratorio', 'Model');

/**
 * PacientesLaboratorio Test Case
 *
 */
class PacientesLaboratorioTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.pacientes_laboratorio',
		'app.paciente',
		'app.laboratorio'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PacientesLaboratorio = ClassRegistry::init('PacientesLaboratorio');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PacientesLaboratorio);

		parent::tearDown();
	}

}
