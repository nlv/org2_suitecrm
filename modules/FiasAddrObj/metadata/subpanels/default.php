<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$module_name='FiasAddrObj';

$subpanel_layout = array(
	'top_buttons' => array(),

	'where' => '',

	'list_fields' => array(
		'postalcode' => array(
			'type' => 'varchar',
			'width' => '25%',
			'vname' => 'LBL_POSTALCODE',
			'default' => true,
		),
		'shortname' => array(
			'type' => 'varchar',
			'width' => '5%',
			'vname' => 'LBL_SHORTNAME1',
			'default' => true,
		),
		'name' => array(
			'width' => '40%',
			'vname' => 'LBL_NAME',
			'default' => true,
			'widget_class' => 'SubPanelDetailViewLink',
		),
		'code' => array(
			'type' => 'varchar',
			'width' => '30%',
			'vname' => 'LBL_CODE',
			'default' => true,
		),
		/*'edit_button' => array (
			'vname' => 'LBL_EDIT_BUTTON',
			'widget_class' => 'SubPanelEditButton',
			'module' => 'Fias',
			'width' => '4%',
			'default' => true,
		),
		'remove_button' => array (
			'vname' => 'LBL_REMOVE',
			'widget_class' => 'SubPanelRemoveButton',
			'module' => 'Fias',
			'width' => '5%',
			'default' => true,
		),*/
	),
);
?>