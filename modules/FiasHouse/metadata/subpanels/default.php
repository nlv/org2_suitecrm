<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$module_name = 'FiasHouse';
$subpanel_layout = array(
	'top_buttons' => array(),

	'where' => '',

	'list_fields' => array(
		'postalcode' => array(
			'width' => '20%',
			'vname' => 'LBL_POSTALCODE',
		),
		'name'=>array(
	 		'vname' => 'LBL_NAME',
			'widget_class' => 'SubPanelDetailViewLink',
	 		'width' => '10%',
		),
		'buildnum' => array(
			'width' => '10%',
			'vname' => 'LBL_BUILDNUM',
		),
		'strucnum' => array(
			'width' => '10%',
			'vname' => 'LBL_STRUCNUM',
		),
		'aoname' => array(
			'widget_class' => 'SubPanelDetailViewLink',
			'width' => '40%',
			'vname' => 'LBL_AONAME',
			'target_module' => 'FiasAddrObj',
			'target_record_key' => 'AOGUID',
		),
		/*'edit_button'=>array(
		        'vname' => 'LBL_EDIT_BUTTON',
			'widget_class' => 'SubPanelEditButton',
		 	'module' => $module_name,
	 		'width' => '4%',
		),
		'remove_button'=>array(
		        'vname' => 'LBL_REMOVE',
			'widget_class' => 'SubPanelRemoveButton',
		 	'module' => $module_name,
			'width' => '5%',
		),*/
	),
);
?>