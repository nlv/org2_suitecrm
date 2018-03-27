<?php 

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

global $db; 
$id = $db->quote($_REQUEST['id']);
$house_id = $db->quote($_REQUEST['house_id']);
$return_value =array();
$is_house = false;
$sql = "SELECT  o.id vid, o.name,ifnull(o.parentguid,0) parent_id, o.aolevel level, o.fiascode kladr_code,o.fullname, h.name house,"
            . " h.buildnum, h.strucnum, h.postalcode, h.id house_id  FROM fiasaddrobj o "
            . "left outer join fiashouse h on o.id=h.aoguid ";
$sql1=$sql. "WHERE o.id='".$id."' and h.id = '".$house_id."'";
$result = $GLOBALS['db']->query($sql1,true,"ERROR SQL::$sql");
while($row = $GLOBALS['db']->fetchByAssoc($result)){
		$return_value = array_merge_recursive($return_value,$row);
                $is_house=true;
}
while(!empty($id) ) {
$sql1= $sql. "WHERE o.id='".$id."'";
$result = $GLOBALS['db']->query($sql1,true,"ERROR SQL::$sql");
	while($row = $GLOBALS['db']->fetchByAssoc($result)){
                $row['house_id']="";  
		$return_value = array_merge_recursive($return_value,$row);
                $id = $row['parent_id'];
	        $level = $row['level'];

	 } 
}
echo json_encode($return_value);
exit();
?>
