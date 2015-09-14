<?php
App::uses('Signo', 'Model');

/**
 * Signo Test Case
 *
 */
class SignoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.signo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Signo = ClassRegistry::init('Signo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Signo);

		parent::tearDown();
	}

}
