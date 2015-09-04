<?php
App::uses('PacientesSigno', 'Model');

/**
 * PacientesSigno Test Case
 *
 */
class PacientesSignoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.pacientes_signo',
		'app.paciente',
		'app.signo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PacientesSigno = ClassRegistry::init('PacientesSigno');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PacientesSigno);

		parent::tearDown();
	}

}
