<?php
App::uses('AppModel', 'Model');
/**
 * PacientesResultado Model
 *
 * @property Paciente $Paciente
 * @property Resultado $Resultado
 * @property Examene $Examene
 */
class PacientesResultado extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Paciente' => array(
			'className' => 'Paciente',
			'foreignKey' => 'paciente_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Resultado' => array(
			'className' => 'Resultado',
			'foreignKey' => 'resultado_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Examene' => array(
			'className' => 'Examene',
			'foreignKey' => 'examene_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
