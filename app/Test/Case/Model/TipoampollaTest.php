<?php
App::uses('Tipoampolla', 'Model');

/**
 * Tipoampolla Test Case
 *
 */
class TipoampollaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tipoampolla'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tipoampolla = ClassRegistry::init('Tipoampolla');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tipoampolla);

		parent::tearDown();
	}

}
