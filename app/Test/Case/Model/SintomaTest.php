<?php
App::uses('Sintoma', 'Model');

/**
 * Sintoma Test Case
 *
 */
class SintomaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.sintoma',
		'app.paciente',
		'app.pacientes_sintoma'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Sintoma = ClassRegistry::init('Sintoma');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Sintoma);

		parent::tearDown();
	}

}
