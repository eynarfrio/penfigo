<?php
App::uses('Tipoerocione', 'Model');

/**
 * Tipoerocione Test Case
 *
 */
class TipoerocioneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tipoerocione'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tipoerocione = ClassRegistry::init('Tipoerocione');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tipoerocione);

		parent::tearDown();
	}

}
