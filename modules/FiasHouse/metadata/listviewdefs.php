<?php
$module_name = 'FiasHouse';
$listViewDefs[$module_name] = array(
	'POSTALCODE' => array(
		'width' => '20%',
		'label' => 'LBL_POSTALCODE',
		'default' => true,
	),
	'AONAME' => array(
		'type' => 'relate',
		'link' => true,
		'label' => 'LBL_AONAME',
		'id' => 'AOGUID',
		'module' => 'FiasAddrObj',
		'width' => '50%',
		'default' => true,
		'related_fields' => array('aoguid'),
	),
	'NAME' => array(
		'width' => '10%',
		'label' => 'LBL_NAME',
		'default' => true,
		'link' => true,
	),
	'BUILDNUM' => array(
		'width' => '10%',
		'label' => 'LBL_BUILDNUM',
		'default' => true,
	),
	'STRUCNUM' => array(
		'width' => '10%',
		'label' => 'LBL_STRUCNUM',
		'default' => true,
	),
);
?>
