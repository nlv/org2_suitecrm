<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point'); 

$layout_defs["FiasAddrObj"]["subpanel_setup"]['fiasaddrobj_fiasaddrobj'] = array(
	'order' => 50,
	'module' => 'FiasAddrObj',
	'sort_order' => 'asc',
	'sort_by' => 'name',
	'subpanel_name' => 'default',
	'title_key' => 'LBL_FIASADDROBJ_FIASADDROBJ_FROM_FIASADDROBJ_R_TITLE',
	'get_subpanel_data' => '',
	/*'top_buttons' => array(
		0 => array(
			'widget_class' => 'SubPanelTopButtonQuickCreate',
		),
		1 => array(
			'widget_class' => 'SubPanelTopSelectButton',
			'mode' => 'MultiSelect',
		),
	),*/
);
?>