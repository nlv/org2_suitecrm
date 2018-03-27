<?PHP
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once("include/SugarObjects/templates/basic/Basic.php");

class FiasHouse extends Basic {
	var $new_schema = true;
	var $module_dir = 'FiasHouse';
	var $object_name = 'FiasHouse';
	var $table_name = 'fiashouse';
	var $importable = false;
	var $disable_row_level_security = true ; // to ensure that modules created and deployed under CE will continue to function under team security if the instance is upgraded to PRO
		
	var $id;
	var $name;
	var $date_entered;
	var $date_modified;
	var $modified_user_id;
	var $modified_by_name;
	var $created_by;
	var $created_by_name;
	var $description;
	var $deleted;
	var $securitygroup;
	var $created_by_link;
	var $modified_user_link;
	var $assigned_user_id;
	var $assigned_user_name;
	var $assigned_user_link;

	var $postalcode;
	var $updatedate;
	var $buildnum;
	var $strucnum;
	var $houseid;
	var $counter;
	var $aoname;
	var $aoguid;
	
	function __construct(){	
		parent::Basic();
	}
	
	function bean_implements($interface){
		switch($interface){
			case 'ACL': return true;
		}
		return false;
	}
}
?>