<?php

class AddrFIAS extends Basic {
	var $new_schema = true;
	var $module_dir = 'Addr_FIAS';
	var $object_name = 'AddrFIAS';
	var $table_name = 'addr_fias';

	var $disable_row_level_security = true ;

	// Fields 
	var $fias_address_type;
	var $fias_address_fullname;
	var $fias_address_fullname_id;
	var $fias_address_house_id;
	var $fias_address_postalcode;
	var $fias_address_room;
	
	 function bean_implements($interface){
		switch($interface){
			case 'ACL': return true;
		}
	return false;
	}
}
?>
