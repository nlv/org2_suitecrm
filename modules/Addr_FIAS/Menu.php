<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

global $mod_strings;
$module_menu[] = Array("index.php?module=Addr_FIAS&action=EditView&return_module=Addr_FIAS&return_action=DetailView", $mod_strings['LNK_NEW_ADDRFIAS'],"Addr_FIAS");
$module_menu[] = Array("index.php?module=Addr_FIAS&action=ListView&return_module=Addr_FIAS&return_action=ListView", $mod_strings['LBL_LIST_ADDR_FIAS'],"Addr_FIAS");
?>
