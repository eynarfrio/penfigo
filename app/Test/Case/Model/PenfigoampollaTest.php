<?php
App::uses('Penfigoampolla', 'Model');

/**
 * Penfigoampolla Test Case
 *
 */
class PenfigoampollaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.penfigoampolla',
		'app.penfigo',
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
		$this->Penfigoampolla = ClassRegistry::init('Penfigoampolla');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Penfigoampolla);

		parent::tearDown();
	}

}
