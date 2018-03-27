<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$module_name = 'FiasAddrObj';
$listViewDefs[$module_name] = array(
	'POSTALCODE' => array(
		'width' => '10%',
		'label' => 'LBL_POSTALCODE',
		'default' => true,
	),
	'CODE' => array(
		'width' => '15%',
		'label' => 'LBL_CODE',
		'default' => true,
	),
	'SHORTNAME' => array(
		'width' => '5%',
		'label' => 'LBL_SHORTNAME1',
		'default' => true,
	),
	'NAME' => array(
		'width' => '20%',
		'label' => 'LBL_NAME',
		'default' => true,
		'link' => true,
	),
	'PARENTNAME' => array(
		'width' => '50%',
		'label' => 'LBL_PARENTNAME',
		'default' => true,
		'link' => true,
		'id' => 'PARENTGUID',
		'module' => 'FiasAddrObj',
		'related_fields' => array('parentguid'),
	),
);
?>