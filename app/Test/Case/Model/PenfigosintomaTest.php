<?php
App::uses('Penfigosintoma', 'Model');

/**
 * Penfigosintoma Test Case
 *
 */
class PenfigosintomaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.penfigosintoma',
		'app.pielsintomas',
		'app.penfigo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Penfigosintoma = ClassRegistry::init('Penfigosintoma');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Penfigosintoma);

		parent::tearDown();
	}

}
