<?PHP

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once("include/SugarObjects/templates/basic/Basic.php");
require_once("data/BeanFactory.php");

class FiasAddrObj extends Basic {
	var $new_schema = true;
	var $module_dir = 'FiasAddrObj';
	var $object_name = 'FiasAddrObj';
	var $table_name = 'fiasaddrobj';
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
	
	var $shortname;
	var $postalcode;
	var $aolevel;
	var $code;
	var $plaincode;
	var $aoid;
	var $updatedate;
	var $fullname;
	var $parentname;
	var $parentguid;	
	var $fiascode;
	
	function __construct(){	
		parent::Basic();
	}
	
	function bean_implements($interface){
		switch($interface){
			case 'ACL': return true;
		}
		return false;
	}
	
	/**
	 * Функция формирует полное наименование из фрагментов
	 * @static
	 * @param integer $aolevel Уровень ФИАС
	 * @param string $shortname Префикс наименования ("г", "ул" и т.д.)
	 * @param string $name Наименование объекта
	 * @param string $parentname Полное наименование родительского объекта
	 * @return string Полное наименование
	 */
	static private function _calc_fullname($aolevel, $shortname, $name, $parentname) {
		$result = (($aolevel > 0) && !empty($parentname) ? $parentname . ', ' : '')
			. (empty($shortname) ? '' : $shortname . '.') 
			. $name;
		return $result;
	}

		/**
	 * Функция, которая вычисляет значение поля fullname по полям name, shortname
	 * и parentname
	 * @static
	 * @param FiasAddrObj $bean Ссылка на запись, которую нужно обработать
	 * @return mixed Вычисленное значение fullname или false в случае ошибки
	 */
	static function calc_fullname($bean) {
		if (($bean instanceof FiasAddrObj)
			&& (!empty($bean->name))) 
		{
			$result = self::_calc_fullname($bean->aolevel, $bean->shortname,
				$bean->name, $bean->parentname);
		} else {
			$result = false;
		}
		return $result;
	}
	
	function save($check_notify = FALSE) {
		$old_shortname = html_entity_decode($this->fetched_row['shortname']);
		$old_name = html_entity_decode($this->fetched_row['name']);
		$old_parentguid = html_entity_decode($this->fetched_row['parentguid']);
		
		if (($this->shortname <> $old_shortname)
			|| ($this->name <> $old_name)
			|| ($this->parentguid <> $old_parentguid))
		{
			if ($this->parentguid <> $old_parentguid) {
				$parent = BeanFactory::getBean($this->module_name, $this->parentguid);
				if ($parent) {
					$this->parentname = $parent->fullname;
				}
			}
			$this->fullname = self::calc_fullname($this->aolevel, 
				$this->shortname, $this->name, $this->parentname);
		}

		parent::save($check_notify);
	}
}
?>