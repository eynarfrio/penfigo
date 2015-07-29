<?php
App::uses('AppModel', 'Model');
/**
 * Penfigoerocione Model
 *
 * @property Penfigo $Penfigo
 * @property Area $Area
 * @property Tipoerocione $Tipoerocione
 */
class Penfigoerocione extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Penfigo' => array(
			'className' => 'Penfigo',
			'foreignKey' => 'penfigo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Area' => array(
			'className' => 'Area',
			'foreignKey' => 'area_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tipoerocione' => array(
			'className' => 'Tipoerocione',
			'foreignKey' => 'tipoerocione_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
