<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$listViewDefs['Addr_FIAS'] = array (
	'FIAS_ADDRESS_TYPE' => array (
		'width' => '10',
		'label' => 'LBL_FIAS_ADDRESS_TYPE',
		'link' => false,
		'sortable' => true,
		'default' => true,
	), 
	'FIAS_ADDRESS_POSTALCODE' => array (
	   'width' => '10',
	   'label' => 'LBL_FIAS_ADDRESS_POSTALCODE',
	   'link' => false,
	   'sortable' => true,
	   'default' => true,
	),
	'FIAS_ADDRESS_FULLNAME' => array(
		'width' => '50',
		'label' => 'LBL_FIAS_ADDRESS_FULLNAME',
		'link' => true,
		'sortable' => true,
		'default' => true,
	),
    'PARENT_NAME' => array(
        'width'   => '30', 
        'label'   => 'LBL_LIST_RELATED_TO',
        'dynamic_module' => 'PARENT_TYPE',
        'id' => 'PARENT_ID',
        'link' => true, 
        'default' => true,
        'sortable' => false,        
        'ACLTag' => 'PARENT',
        'related_fields' => array('parent_id', 'parent_type')
	), 
);
?>