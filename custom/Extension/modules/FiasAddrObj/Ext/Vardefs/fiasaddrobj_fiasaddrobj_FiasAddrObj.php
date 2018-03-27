<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$dictionary["FiasAddrObj"]["fields"]["fiasaddrobj_fiasaddrobj"]=array (
  'name' => 'fiasaddrobj_fiasaddrobj',
  'type' => 'link',
  'relationship' => 'fiasaddrobj_fiasaddrobj',
  'source' => 'non-db',
  'module' => 'FiasAddrObj',
  'bean_name' => false,
  'vname' => 'LBL_FIASADDROBJ_FIASADDROBJ_FROM_FIASADDROBJ_L_TITLE',
  'id_name' => 'parentguid',
  'side' => 'left',
);
$dictionary["FiasAddrObj"]["fields"]["parentname"] = array(
	'name' => 'parentname',
	'type' => 'relate',
	'source' => 'non-db',
	/*'vname' => 'LBL_FIASADDROBJ_FIASADDROBJ_FROM_FIASADDROBJ_L_TITLE',*/
	'vname' => 'LBL_PARENTNAME',
	/*'save' => true,*/
	'id_name' => 'parentguid',
	'link' => 'fiasaddrobj_fiasaddrobj',
	'table' => 'fiasaddrobj',
	'module' => 'FiasAddrObj',
	'rname' => 'fullname',
	'required' => false,
	'massupdate' => 0,
	'reportable' => true,
	'unified_search' => false,
	/*'join_name' => 'fiasaddrobj_fiasaddrobj',*/
);
$dictionary["FiasAddrObj"]["fields"]["parentguid"] = array(
	'name' => 'parentguid',
	'type' => 'id',
	'relationship' => 'fiasaddrobj_fiasaddrobj',
	'reportable' => false,
	'side' => 'right',
	/*'vname' => 'LBL_FIASADDROBJ_FIASADDROBJ_FROM_FIASADDROBJ_R_TITLE',*/
	'vname' => 'LBL_PARENTGUID',
	'required' => false,
	'massupdate' => 0,
	'importable' => 'true',
	'duplicate_merge' => 'disabled',
	'duplicate_merge_dom_value' => '0',
	'reportable' => false,
	'unified_search' => false,
	'merge_filter' => 'disabled',
	'len' => '36',
	'isnull' => true,
);
$dictionary["FiasAddrObj"]["indices"]["idx_fiasaddrobj_parentguid"] = array(
	'name' => 'idx_fiasaddrobj_parentguid',
	'type' => 'index', 
	'fields' => array('parentguid'),
);
?>