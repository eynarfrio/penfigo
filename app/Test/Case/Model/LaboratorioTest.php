<?php
App::uses('Laboratorio', 'Model');

/**
 * Laboratorio Test Case
 *
 */
class LaboratorioTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.laboratorio'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Laboratorio = ClassRegistry::init('Laboratorio');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Laboratorio);

		parent::tearDown();
	}

}
