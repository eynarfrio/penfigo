<?php
App::uses('Examene', 'Model');

/**
 * Examene Test Case
 *
 */
class ExameneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.examene'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Examene = ClassRegistry::init('Examene');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Examene);

		parent::tearDown();
	}

}
