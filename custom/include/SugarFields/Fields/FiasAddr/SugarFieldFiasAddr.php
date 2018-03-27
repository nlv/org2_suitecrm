<?php

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

require_once('include/SugarFields/Fields/Base/SugarFieldBase.php');

class SugarFieldFiasAddr extends SugarFieldBase {

    private $levels = array();

    function getDetailViewSmarty($parentFieldArray, $vardef, $displayParams, $tabindex) {
        $this->setup($parentFieldArray, $vardef, $displayParams, $tabindex);
        global $app_strings;
        if (!isset($displayParams['key'])) {
            $GLOBALS['log']->debug($app_strings['ERR_ADDRESS_KEY_NOT_SPECIFIED']);
            $this->ss->trigger_error($app_strings['ERR_ADDRESS_KEY_NOT_SPECIFIED']);
            return;
        }
        //Allow for overrides.  You can specify a Smarty template file location in the language file.
        if (isset($app_strings['SMARTY_ADDRESS_DETAILVIEW'])) {
            $tplCode = $app_strings['SMARTY_ADDRESS_DETAILVIEW'];
            return $this->fetch($tplCode);
        }

        return $this->fetch($this->findTemplate('DetailView'));
    }
    
    function getEditViewSmarty($parentFieldArray, $vardef, $displayParams, $tabindex) {
        //                $GLOBALS['log']->debug('==> fields: We are here');
        global $app_strings;
        // returned parameters of popup window
        $arr_country = array (
            'id' => 'id',
            'code' => 'kladr_code',
            'fullname' => 'fullname',
            'aolevel' => 'level',
            'parentguid' => 'parent_id',);
        // this function is called after presing clear button
        $arr_js_country = $displayParams["key"] . "_address.clear_fias_address_flds(this);";
        // returned parameters of popup window
        $arr_house = array (
            'name' => 'house',
            'id' => 'id',
            'code' => 'kladr_code',
            'aolevel' => 'level',
            'aoguid' => 'parent_id',
            'buildnum' => 'buildnum',
            'strucnum' => 'strucnum',
            'aoname' => 'fullname',
            'postalcode' => 'postalcode',);
        // this function is called after presing clear button
        $arr_js_house = $displayParams["key"] . "_address.clear_fias_address_house_flds();";

        if (!isset($displayParams['key'])) {
            $GLOBALS['log']->debug($app_strings['ERR_ADDRESS_KEY_NOT_SPECIFIED']);
            $this->ss->trigger_error($app_strings['ERR_ADDRESS_KEY_NOT_SPECIFIED']);
            return;
        }

        $displayParams["form_name"] = "EditView";
        // getting all required Fias fields
        $displayParams['fields'] = $this->getDisplayParamsForFields($displayParams['key'], $displayParams['module']);
        $json = getJSONobj();
        $v_param = array();
        // adding additional parameters for each field 
        foreach ($displayParams['fields'] as $key => &$fld) {
            if (!empty($fld["id_name"]))
                if (in_array($key, array("house", "buildnum", "strucnum"))) {
                    $v_param = array(
                        'call_back_function' => $displayParams["key"] . "_address.callback_address_house",
                        'field_to_name_array' => $arr_house,
                    );
                    $fld['javascript'] = $arr_js_house;
                    $fld["size"] = "10"; // size 10 
                    $fld["return_function"] = $displayParams["key"] . "_address.return_url_house()";
                } else {
                    $v_param = array(
                        'call_back_function' => $displayParams["key"] . "_address.callback_address",
                        'field_to_name_array' => array_merge($arr_country, array('name' => $fld['name'])),
                    );
                    $fld['javascript'] = $arr_js_country;
                    $fld["return_function"] = $displayParams["key"] . '_address.return_url("' . $fld['name'] . '")';
                    if ($key == "fullname") {
                        $fld["size"] = 80; // a fullname size = 80
                    }
                }
            $fld['popup_request_data'] = '{literal}' . $json->encode($v_param) . '{/literal}';
            if ($key == "room") {
                $fld["size"] = 10; // 10
            }
        }

        $this->setup($parentFieldArray, $vardef, $displayParams, $tabsindex);
        //Allow for overrides.  You can specify a Smarty template file location in the language file.
        if (isset($app_strings['SMARTY_ADDRESS_EDITVIEW'])) {
            $tplCode = $app_strings['SMARTY_ADDRESS_EDITVIEW'];
            return $this->fetch($tplCode);
        }

        return $this->fetch($this->findTemplate('EditView'));
    }

    /**
     * @param $key - Address group field key (primary, billing, shipping, ...)
     * @return array - array of fields included in Address group and their vardefs
     */
    private function getDisplayParamsForFields($key, $module) {
        // Если ссылка на адресообразующий объект указана, то извлечем все уровни рекурсивно
        //		$GLOBALS['log']->debug('==> fields:' . print_r($fields, true));
        $focus = BeanFactory::getBean($module);

        // Заполняем основные данные для smarty
        $fields = array(
            'country' =>    array('name' => $key . '_country','id_name' => $key . '_country_id', 'vname' => 'LBL_COUNTRY', 'required' => false) ,
            'region' =>     array('name' => $key . '_region','id_name' => $key . '_region_id', 'vname' => 'LBL_REGION', 'required' => false) ,
            'autonomy' =>   array('name' => $key . '_autonomy','id_name' => $key . '_autonomy_id', 'vname' => 'LBL_AUTONOMY', 'required' => false) ,
            'district' =>   array('name' => $key . '_district','id_name' => $key . '_district_id', 'vname' => 'LBL_DISTRICT', 'required' => false) ,
            'city' =>       array('name' => $key . '_city','id_name' => $key . '_city_id', 'vname' => 'LBL_CITY', 'required' => false) ,
            'citycode' =>   array('name' => $key . '_citycode','id_name' => $key . '_citycode_id', 'vname' => 'LBL_CITYCODE', 'required' => false) ,
            'village' =>    array('name' => $key . '_village','id_name' => $key . '_village_id', 'vname' => 'LBL_VILLAGE', 'required' => false) ,
            'street' =>     array('name' => $key . '_street','id_name' => $key . '_street_id', 'vname' => 'LBL_STREET', 'required' => false) ,
            'house' =>      array('name' => $key . '_house','id_name' => $key . '_house_id', 'vname' => 'LBL_HOUSE', 'required' => false) ,
            'buildnum' =>   array('name' => $key . '_buildnum','id_name' => $key . '_buildnum_id', 'vname' => 'LBL_BUILDNUM', 'required' => false) ,
            'strucnum' =>   array('name' => $key . '_strucnum','id_name' => $key . '_strucnum_id', 'vname' => 'LBL_STRUCNUM', 'required' => false) ,
            'room' =>       array('name' => $key . '_room','id_name' => '', 'vname' => 'LBL_ROOM', 'required' => false),
            'postalcode' => array('name' => $key . '_postalcode','id_name' => '', 'vname' => 'LBL_POSTALCODE', 'required' => false),
            'fullname' => array('name' => $key . '_fullname','id_name' => $key . '_fullname_id', 'vname' => 'LBL_FULLNAME', 'required' => true) ,
        );

        return $fields;
    }

}

?>