<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$module_name = 'FiasHouse';
$searchFields[$module_name] = array(
	'postalcode' => array('query_type' => 'default'),
	'name' => array('query_type' => 'default'),
	'buildnum' => array('query_type' => 'default'),
	'strucnum' => array('query_type' => 'default'),
);
?>