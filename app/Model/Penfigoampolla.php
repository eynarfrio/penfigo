<?php
App::uses('AppModel', 'Model');
/**
 * Penfigoampolla Model
 *
 * @property Penfigo $Penfigo
 * @property Area $Area
 * @property Tipoampolla $Tipoampolla
 */
class Penfigoampolla extends AppModel {


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
		'Tipoampolla' => array(
			'className' => 'Tipoampolla',
			'foreignKey' => 'tipoampolla_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
