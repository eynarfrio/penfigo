<?php
App::uses('AppModel', 'Model');
/**
 * Penfigosintoma Model
 *
 * @property Pielsintomas $Pielsintomas
 * @property Penfigo $Penfigo
 */
class Penfigosintoma extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Pielsintomas' => array(
			'className' => 'Pielsintomas',
			'foreignKey' => 'pielsintomas_id',
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
