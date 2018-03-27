<?php

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

function extract_numbers($string) {
    $match = array();
    preg_match_all('/([\d]+)/', $string, $match);
    return $match[0];
}
 
function replace_delimiters($xstr, $xchar) {
    $p_str = $xstr;
    $p_str = str_replace("д.", $xchar, $p_str);
    $p_str = str_replace("корп.", $xchar, $p_str);
    $p_str = str_replace("обл.", $xchar, $p_str);
    $p_str = str_replace("стр.", $xchar, $p_str);
    $p_str = str_replace(" ", $xchar, $p_str);
    $p_str = str_replace("-", $xchar, $p_str);
    $p_str = str_replace(",", $xchar, $p_str);
    $p_str = str_replace(" ", $xchar, $p_str);
    $p_str = str_replace(";", $xchar, $p_str);
    $p_str = str_replace(".", $xchar, $p_str);
    return $p_str;
}

global $db;
$return_value = array();
$fullname = $db->quote($_REQUEST['fullname']);
$parent_id = $db->quote($_REQUEST['parent_id']);
$house = $db->quote($_REQUEST['house']);
$buildnum = $db->quote($_REQUEST['buildnum']);
$strucnum = $db->quote($_REQUEST['strucnum']);
$postalcode = $db->quote($_REQUEST['postalcode']);
$name = $db->quote($_REQUEST['name']);
$level = $db->quote($_REQUEST['level']);
$code = $db->quote($_REQUEST['kladr_code']);

if (isset($_REQUEST['fullname'])) {
    // searching by fullname
    $arr_words = explode(' ', replace_delimiters($fullname, " "));
    $search_str = "";
    $short_search = "";
    for ($i = 0; $i <= count($arr_words); $i++) {
        if (mb_strlen($arr_words[$i], 'utf-8') >= 4 && !is_numeric($arr_words[$i])) {
            $search_str .= '+' . $arr_words[$i] . '* ';
        } else {
            $short_search.= '%' . $arr_words[$i] . '%';
        }
    }
    $sql = "select a.* "
            . ",h.name house,"
            . "h.buildnum, h.strucnum, ifnull(h.postalcode,a.postalcode) postalcode, h.id house_id, h.aoguid "
            . "from (select  o.id, o.name,ifnull(o.parentguid,0) parent_id, o.aolevel level, o.fiascode kladr_code,o.fullname, o.postalcode FROM fiasaddrobj o "
            . "WHERE  match(o.fullname) against ('" . $search_str . "' IN BOOLEAN MODE) "
            . "order by match(o.fullname) against ('" . $search_str . "') desc limit 10) a "
            . "left outer join fiashouse h on a.id=h.aoguid where ";
    $cond = "concat(a.fullname, ' ', ifnull(h.name,' '), ' ', ifnull(h.buildnum,' '), ' ', ifnull(h.strucnum ,' '))";
    $sql = $sql . $cond . " like '" . $short_search . "'";
} elseif (isset($_REQUEST['parent_id'])) {
    // searching by parent_id
    $sql = "SELECT  o.id, o.name,ifnull(o.parentguid,0) parent_id, o.aolevel level, o.fiascode kladr_code,o.fullname, h.name house,"
            . " h.buildnum, h.strucnum, ifnull(h.postalcode,o.postalcode) postalcode, h.id house_id, h.aoguid  FROM fiasaddrobj o "
            . "left outer join fiashouse h on o.id=h.aoguid WHERE ";

    $sql = $sql . "o.id = '" . $parent_id . "' and ifnull(h.name,'x') like '" . $house . "%' "
            . " and ifnull(h.buildnum,'x') like '" . $buildnum . "%' and ifnull(h.strucnum,'x') like '" . $strucnum . "%' "
            //. " and ifnull(h.postalcode,'x') like '" . $postalcode . "%'"
            . " limit 10";
} else {
    // searching by fiascode and name
    $sql = "SELECT  o.id, o.name,o.parentguid parent_id, o.aolevel level, o.fiascode kladr_code,o.fullname, '' house,"
            . "  '' buildnum, '' strucnum, o.postalcode postalcode, '' house_id , '' aoguid FROM fiasaddrobj o "
            . " WHERE ";
    $sql = $sql . "o.name like '" . $name . "%' and o.aolevel='" . $level . "' and o.fiascode like '" . $code . "%' limit 10";
}


$result = $db->query($sql, true, "ERROR SQL::$sql");
while ($row = $db->fetchByAssoc($result)) {

    $fullname = $row["fullname"];
    if (!empty($row["house"]))
        $fullname = $fullname . ", д." . $row["house"];
    if (!empty($row["buildnum"]))
        $fullname = $fullname . ", корп." . $row["buildnum"];
    if (!empty($row["strucnum"]))
        $fullname = $fullname . ", стр." . $row["strucnum"];

    $row["fullnameall"] = $fullname;
    array_push($return_value, $row);
}


echo json_encode($return_value);
exit();
?>
