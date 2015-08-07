<?php
App::uses('PacientesTipoerocione', 'Model');

/**
 * PacientesTipoerocione Test Case
 *
 */
class PacientesTipoerocioneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.pacientes_tipoerocione',
		'app.tipoerocione',
		'app.areaampolla',
		'app.area',
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
		$this->PacientesTipoerocione = ClassRegistry::init('PacientesTipoerocione');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PacientesTipoerocione);

		parent::tearDown();
	}

}
