<?php
App::uses('Pielsintoma', 'Model');

/**
 * Pielsintoma Test Case
 *
 */
class PielsintomaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.pielsintoma'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Pielsintoma = ClassRegistry::init('Pielsintoma');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Pielsintoma);

		parent::tearDown();
	}

}
