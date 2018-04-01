<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');


require_once('modules/Contacts/views/view.detail.php');

class CustomContactsViewDetail extends ContactsViewDetail
{
 	/**
 	 * @see SugarView::display()
	 *
 	 * We are overridding the display method to manipulate the portal information.
 	 * If portal is not enabled then don't show the portal fields.
 	 */
	public function display(){
            global $app_list_strings;
 	    $this->ss->assign('APP_LIST', $app_list_strings);
	    parent::display();
	}
}
