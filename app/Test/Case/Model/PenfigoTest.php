<?php
App::uses('Penfigo', 'Model');

/**
 * Penfigo Test Case
 *
 */
class PenfigoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.penfigo',
		'app.penfigoampolla',
		'app.area',
		'app.tipoampolla'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Penfigo = ClassRegistry::init('Penfigo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Penfigo);

		parent::tearDown();
	}

}
