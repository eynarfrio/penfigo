<?php
App::uses('Penfigoerocione', 'Model');

/**
 * Penfigoerocione Test Case
 *
 */
class PenfigoerocioneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.penfigoerocione',
		'app.penfigo',
		'app.area',
		'app.tipoerocione'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Penfigoerocione = ClassRegistry::init('Penfigoerocione');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Penfigoerocione);

		parent::tearDown();
	}

}
