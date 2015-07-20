<?php
App::uses('AppModel', 'Model');
/**
 * Areaampolla Model
 *
 * @property Area $Area
 * @property Paciente $Paciente
 * @property Medico $Medico
 */
class Areaampolla extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Area' => array(
			'className' => 'Area',
			'foreignKey' => 'area_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Paciente' => array(
			'className' => 'Paciente',
			'foreignKey' => 'paciente_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Medico' => array(
			'className' => 'Medico',
			'foreignKey' => 'medico_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
