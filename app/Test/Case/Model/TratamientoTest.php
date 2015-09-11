<?php
App::uses('Tratamiento', 'Model');

/**
 * Tratamiento Test Case
 *
 */
class TratamientoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tratamiento',
		'app.paciente'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tratamiento = ClassRegistry::init('Tratamiento');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tratamiento);

		parent::tearDown();
	}

}
