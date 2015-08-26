<?php
App::uses('AppModel', 'Model');
/**
 * Resultado Model
 *
 * @property Examene $Examene
 */
class Resultado extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Examene' => array(
			'className' => 'Examene',
			'foreignKey' => 'examene_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
    'Penfigo' => array(
			'className' => 'Penfigo',
			'foreignKey' => 'penfigo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
