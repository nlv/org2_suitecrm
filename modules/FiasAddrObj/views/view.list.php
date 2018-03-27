<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.list.php');

class FiasAddrObjViewList extends ViewList {
 	/**
	 * @see SugarView::getModuleTitle()
	 */
    public function getModuleTitle($show_help = false) {
		parent::getModuleTitle(false);
	}
}