<?php
App::uses('AppModel', 'Model');
/**
 * PacientesTipoerocione Model
 *
 * @property Tipoerocione $Tipoerocione
 * @property Areaampolla $Areaampolla
 */
class PacientesTipoerocione extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Tipoerocione' => array(
			'className' => 'Tipoerocione',
			'foreignKey' => 'tipoerocione_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Areaampolla' => array(
			'className' => 'Areaampolla',
			'foreignKey' => 'areaampolla_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
