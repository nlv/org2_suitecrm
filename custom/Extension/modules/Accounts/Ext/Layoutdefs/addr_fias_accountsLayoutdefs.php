<?php
$layout_defs['Accounts']['subpanel_setup']['addr_fias'] = array(
	'order' => 40,
	'sort_by' => 'fias_address_type',
	'sort_order' => 'asc',
	'module' => 'Addr_FIAS',
	'refresh_page'=>1,
	'subpanel_name' => 'default',
	'get_subpanel_data' => 'addr_fias',
	'add_subpanel_data' => 'address_id',
	'title_key' => 'LBL_ADDR_FIAS_SUBPANEL_TITLE',
	'top_buttons' => array (
		0 => array (
			'widget_class' => 'SubPanelTopButtonQuickCreate',
		),
		1 => array (
			'widget_class' => 'SubPanelTopSelectButton',
			'mode' => 'MultiSelect',
		),
	),
);
?>