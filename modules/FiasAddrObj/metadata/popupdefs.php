<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$popupMeta = array(
	'moduleMain' => 'FiasAddrObj',
	'varName' => 'FIASADDROBJ',
	'orderBy' => 'name',
	'whereClauses' => array(
		'name' => 'fiasaddrobj.name',
		'aolevel' => 'fiasaddrobj.aolevel',
		'code' => 'fiasaddrobj.code'
	),
	'searchInputs' => array('name', 'aolevel', 'code'),

	'searchdefs' => array(
  		'name',
		'fullname',
		'aolevel',
		'code',
	),
);
?>