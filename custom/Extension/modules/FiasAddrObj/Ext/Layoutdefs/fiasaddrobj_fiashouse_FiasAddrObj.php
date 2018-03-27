<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point'); 

$layout_defs["FiasAddrObj"]["subpanel_setup"]['fiasaddrobj_fiashouse'] = array(
	'order' => 100,
	'module' => 'FiasHouse',
	'sort_order' => 'asc',
	'sort_by' => 'name',
	'subpanel_name' => 'default',
	'title_key' => 'LBL_FIASADDROBJ_FIASHOUSE_FROM_FIASHOUSE_TITLE',
	'get_subpanel_data' => 'fiasaddrobj_fiashouse',
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