<?php
App::uses('Areaampolla', 'Model');

/**
 * Areaampolla Test Case
 *
 */
class AreaampollaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
		$this->Areaampolla = ClassRegistry::init('Areaampolla');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Areaampolla);

		parent::tearDown();
	}

}
