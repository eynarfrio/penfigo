<?php
App::uses('Medico', 'Model');

/**
 * Medico Test Case
 *
 */
class MedicoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.medico'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Medico = ClassRegistry::init('Medico');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Medico);

		parent::tearDown();
	}

}
