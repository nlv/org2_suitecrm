<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$subpanel_layout = array(
	'top_buttons' => array(
		array('widget_class' => 'SubPanelTopCreateButton'),
		array('widget_class' => 'SubPanelTopSelectButton',  'popup_module' => 'Addr_FIAS'),
	),

	'where' => '',

	'list_fields' => array (
		'fias_address_type' => array (
			'name' => 'fias_address_type',
			'vname' => 'LBL_FIAS_ADDRESS_TYPE',
			'width' => '10%',
		),
		'fias_address_postalcode' => array (
			'name' => 'fias_address_postalcode',
			'vname' => 'LBL_FIAS_ADDRESS_POSTALCODE',
			'width' => '10%',
		),
		'fias_address_fullname' => array(
			'name' => 'fias_address_fullname',
			'vname' => 'LBL_FIAS_ADDRESS_FULLNAME',
			'width' => '70%',
		),
		'remove_button'=>array(
			'widget_class' => 'SubPanelRemoveButton',
		 	'module' => 'Addr_FIAS',
			'width' => '5%',
		),
		'edit_button'=>array(
			'widget_class' => 'SubPanelEditButton',
		 	'module' => 'Addr_FIAS',
			'width' => '5%',
		),
	),
);
?>