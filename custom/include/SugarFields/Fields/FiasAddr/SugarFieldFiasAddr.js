// Defining class 
(function () {
    var Dom = YAHOO.util.Dom, Event = YAHOO.util.Event;

    SUGAR.FiasAddrField = function (p_key, p_form_id) {
        var _key = p_key + "_";
        // The main array containing the list of fields that use new search rules.
        var _GLOBAL = {fields: {}, hfields: {}};
        _GLOBAL["fields"] = {};
        _GLOBAL["fields"][_key + "country"] = {"level": 0, "id_name": _key + "country_id", "id": '', "parent_id": '', "kladr_code": '', "fullname": ''};
        _GLOBAL["fields"][_key + "region"] = {"level": 1, "id_name": _key + "region_id", "id": '', "parent_id": '', "kladr_code": '', "fullname": ''};
        _GLOBAL["fields"][_key + "autonomy"] = {"level": 2, "id_name": _key + "autonomy_id", "id": '', "parent_id": '', "kladr_code": '', "fullname": ''};
        _GLOBAL["fields"][_key + "district"] = {"level": 3, "id_name": _key + "district_id", "id": '', "parent_id": '', "kladr_code": '', "fullname": ''};
        _GLOBAL["fields"][_key + "city"] = {"level": 4, "id_name": _key + "city_id", "id": '', "parent_id": '', "kladr_code": '', "fullname": ''};
        _GLOBAL["fields"][_key + "citycode"] = {"level": 5, "id_name": _key + "citycode_id", "id": '', "parent_id": '', "kladr_code": '', "fullname": ''};
        _GLOBAL["fields"][_key + "village"] = {"level": 6, "id_name": _key + "village_id", "id": '', "parent_id": '', "kladr_code": '', "fullname": ''};
        _GLOBAL["fields"][_key + "street"] = {"level": 7, "id_name": _key + "street_id", "id": '', "parent_id": '', "kladr_code": '', "fullname": ''};

        _GLOBAL["hfields"] = {"house": "",
            "buildnum": "",
            "strucnum": "",
            "postalcode": "",
            "room": ""};


        var hfields = _GLOBAL["hfields"];
        var form_id = p_form_id;

        var init_var_room = function (v_val, v_room) {
            var res = "";
            if (!empty(v_room)) {
                res = ', кв.' + v_room;
            }
            hfields["room"] = v_val + res;
        };

        var init_var_house = function (v_val) {
            hfields["house"] = v_val;
        };

        var set_fullname_val = function (v_val, v_id) {
            if (!empty(v_id)) {
                $('#' + _key + "fullname_id").val(v_id);
            }
            $('#' + _key + 'fullname').val(v_val);
        };

        var empty = function (p_val) {
            if (p_val === 'undefined')
                return true;
            if (p_val == null)
                return true;
            if (p_val == "")
                return true;
            return false;
        };

        var setAutocomplete = function (p_key) {
            if ($("#" + p_key).hasClass('ui-autocomplete-input')) {
                $("#" + p_key).removeClass('ui-autocomplete-input');
                $("#" + p_key).addClass('ui-autocomplete-loading');
            }
        }

        var unsetAutocomplete = function (p_key) {
            if ($("#" + p_key).hasClass('ui-autocomplete-loading')) {
                $("#" + p_key).removeClass('ui-autocomplete-loading');
                $("#" + p_key).addClass('ui-autocomplete-input');
            }
        }
// Some useful get functions 
// get the  previous parent id

        var get_last_parent_id = function (p_level) {
            var field = _GLOBAL["fields"];
            var v_key = "";
            // take the last parent_id
            for (key in field) {
                if (field[key]['level'] < p_level && !empty(field[key]['id'])) {
                    v_key = key;
                }
            }
            return v_key;
        };

// get the filled previous parent id
        var get_prev_filled_key = function (p_key) {
            var field = _GLOBAL["fields"];
            var v_res = "";
            for (key in field) {
                if (key == p_key)
                    break;
                if (field[key]["id"] != '' && field[key]["id"] != null)
                    v_res = key;
            }
            return v_res;
        };

// Transformation of KLADR code
        var kladr_code_level = function (p_plv, p_kode) {
            var v_code = p_kode;
            switch (p_plv) {
                case 0 :
                    v_code = "";
                    break;
                case 1 :
                    v_code = v_code.substr(0, 2);
                    break;
                case 2 :
                    v_code = v_code.substr(0, 4);
                    break;
                case 3 :
                    v_code = v_code.substr(0, 7);
                    break;
                case 4 :
                    v_code = v_code.substr(0, 11);
                    break;
                case 5 :
                    v_code = v_code.substr(0, 14);
                    break;
                case 6 :
                    v_code = v_code.substr(0, 16);
                default :
                    v_code = v_code.substr(0, 20);
            }
            return v_code;
        };

// clear fields that are below the current item
        var clear_flds_below = function (p_level) {
            var field = _GLOBAL["fields"];
            var v_lv = p_level;
            if (v_lv < 7)
                for (key in field) {
                    if (field[key]['level'] > v_lv) {
                        document.getElementById(key).value = "";
                        document.getElementById(field[key]['id_name']).value = "";
                        field[key]['parent_id'] = "";
                        field[key]['kladr_code'] = "";
                        field[key]['id'] = "";
                        field[key]['fullname'] = "";
                    }
                }
        };
// this fuction is called every time when the clear button is pressed that is next to the select button
        var clear_fias_address_flds = function (p_this) {
            var field = _GLOBAL["fields"];
            var v_name = p_this.name.replace("btn_clr_", "");
            var v_key = get_prev_filled_key(v_name);
            clear_fias_address_house_flds();
            clear_flds_below(field[v_name]["level"]);
            if (v_key != "") {
                set_fullname_val(field[v_key]["fullname"], field[v_key]["id"]);
            }
            else {
                set_fullname_val("", "");
            }
            field[v_name]["id"] = "";
            init_var_room($('#' + _key + 'fullname').val());
        };

        var clear_fias_address_house_flds = function () {
            $('#' + _key + "room").val('');
            $('#' + _key + "postalcode").val('');

            if (empty(hfields["house"]))
                return;
            for (key in hfields) {
                $('#' + _key + key).val('');
                $('#' + _key + key + "_id").val('');
            }
            v_fulladdress = hfields["house"];
            set_fullname_val(v_fulladdress);
            init_var_house("");
            init_var_room($('#' + _key + 'fullname').val());
        };

// Creating a new url based on values of the previous item
        var return_url = function (p_name, p_kladr_code) {
            if (typeof (p_kladr_code) === 'undefined')
                p_kladr_code = false;
            var field = _GLOBAL["fields"];
            var v_lv = field[p_name]["level"];
            var v_plv = v_lv;
            var v_code = "";
            var v_key = "";
            // take the last parent_id
            v_key = get_last_parent_id(v_lv);
            if (v_key != "") {
                v_code = field[v_key]['kladr_code'];
                v_plv = field[v_key]['level'];
            }

            v_code = kladr_code_level(v_plv, v_code);
            if (p_kladr_code == true)
                return v_code;
            return "&name_advanced=" + encodeURIComponent(document.getElementById(p_name).value) + "&aolevel_advanced=" + v_lv + "&code=" + v_code;
        };

// Creating a new url for house fields
        var return_url_house = function () {
            var field = _GLOBAL["fields"];
            var v_key = get_last_parent_id(8);
            var v_id = "";
            if (v_key != "") {
                v_id = field[v_key]['id'];
            }
            return "&aoguid_advanced=" + encodeURIComponent(v_id);
        };
// Ajax-s Functions
// Filling in fields
        var AddAutocomplete = function (p_key) {
            var field = _GLOBAL["fields"];
            var ajax;
            // $("#" + p_key).keyup(function () {
            $("#" + p_key).autocomplete({
// handling the sources
// calling the php code which fills in an array of data.
                source: function (request, response) {
                    if (typeof ajax != 'undefined')
                        ajax.abort();
                    ajax = jQuery.ajax({
                        url: "index.php?module=FiasAddrObj&action=FiasGetAddress&to_pdf=1",
                        type: "POST",
                        data: {
                            name: document.getElementById(p_key).value,
                            level: field[p_key]["level"],
                            kladr_code: return_url(p_key, true)
                        },
                        dataType: "json",
                        success: function (result) {
                            response($.map(result, function (item) {
                                return {
                                    label: item.name,
                                    value: item.name,
                                    id: item.id,
                                    parent_id: item.parent_id,
                                    kladr_code: item.kladr_code,
                                    fullname: item.fullname,
                                    postalcode: item.postalcode
                                };
                            }));
                        },
                        error: function (msg) {
                            unsetAutocomplete(p_key);
                        }
                    });
                },
// selected item from the list 
                select: function (event, ui) {
                    field[p_key]["id"] = ui.item.id;
                    field[p_key]["parent_id"] = ui.item.parent_id;
                    field[p_key]["kladr_code"] = ui.item.kladr_code;
                    field[p_key]["fullname"] = ui.item.fullname;

                    $('#' + field[p_key]['id_name']).val(ui.item.id);
                    set_fullname_val(field[p_key]["fullname"], field[p_key]["id"]);
                    set_blank_flds(field[p_key]['parent_id']);
                    clear_flds_below(field[p_key]["level"]);
                    set_house_flds('', '', '', '', ui.item.postalcode);
                    init_var_room(field[p_key]["fullname"]);
                },
                autoFocus: true,
                delay :500,
                minLength: 0
            });
//            });
        };

        var AddAutoComHouse = function (p_key) {
            var field = _GLOBAL["fields"];
            var ajax;
            $("#" + p_key).autocomplete({
// handling the sources
// calling the php code which fills in an array of data.
                source: function (request, response) {
                    var fid = get_last_parent_id(8);
                    var v_arr = [];
                    if (!empty(fid)) {
                        v_arr = {parent_id: field[get_last_parent_id(8)]['id']};
                    }
                    else {
                        v_arr = {parent_id: ""};
                    }
                    var v_ar = new Array();
                    for (k in  hfields) {
                        var v_val = $('#' + _key + k).val();
                        switch (k) {
                            case "house" :
                                v_ar = {house: v_val};
                                break;
                            case "buildnum" :
                                v_ar = {buildnum: v_val};
                                break;
                            case "strucnum" :
                                v_ar = {strucnum: v_val};
                                break;
                            case "postalcode" :
                                v_ar = {postalcode: v_val};
                                break;
                            case "room" :
                                v_ar = {room: v_val};
                                break;

                        }
                        v_arr = $.extend(v_arr, v_ar);
                    }
                    if (typeof ajax != 'undefined')
                        ajax.abort();
                    ajax = jQuery.ajax({
                        url: "index.php?module=FiasAddrObj&action=FiasGetAddress&to_pdf=1",
                        type: "POST",
                        data: v_arr,
                        dataType: "json",
                        success: function (result) {
                            response($.map(result, function (item) {
                                var ajax_house_items = {
                                    label: item.fullnameall,
                                    id: item.id,
                                    parent_id: item.parent_id,
                                    kladr_code: item.kladr_code,
                                    fullname: item.fullname,
                                    house: item.house,
                                    buildnum: item.buildnum,
                                    strucnum: item.strucnum,
                                    postalcode: item.postalcode,
                                    aoguid: item.aoguid,
                                    house_id: item.house_id
                                };
                                var v_ar = new Array();
                                switch (p_key.replace(_key, "")) {
                                    case "house" :
                                        v_ar = {value: item.house};
                                        break;
                                    case "buildnum" :
                                        v_ar = {value: item.buildnum};
                                        break;
                                    case "strucnum" :
                                        v_ar = {value: item.strucnum};
                                        break;
                                }
                                return $.extend(ajax_house_items, v_ar);
                            }));
                        },
                        error: function (msg) {
                            unsetAutocomplete(p_key);
                        }
                    });
                },
// selected item from the list 
                select: function (event, ui) {
                    clear_fias_address_house_flds();
                    set_blank_flds(ui.item.aoguid);
                    init_var_house(ui.item.fullname);
                    v_res = set_house_flds(ui.item.house_id, ui.item.house, ui.item.buildnum, ui.item.strucnum, ui.item.postalcode);
                    set_fullname_val(ui.item.fullname + v_res["house"], ui.item.aoguid);
                    init_var_room($('#' + _key + 'fullname').val());

                },
                autoFocus: true,
                delay :500,
                minLength: 0

            });
            //});
        };


// Filling in a Full Name
        var CompleteFullName = function (p_key) {
            var field = _GLOBAL["fields"];
            $("#" + p_key).autocomplete({
// handling the sources
// calling the php code which fills in an array of data.
                source: function (request, response) {
                    jQuery.ajax({
                        url: "index.php?module=FiasAddrObj&action=FiasGetAddress&to_pdf=1",
                        type: "POST",
                        data: {
                            fullname: document.getElementById(p_key).value,
                            postalcode: document.getElementById(_key + "postalcode").value,
                            house: document.getElementById(_key + "house").value,
                            buildnum: document.getElementById(_key + "buildnum").value,
                            strucnum: document.getElementById(_key + "strucnum").value
                        },
                        dataType: "json",
                        success: function (result) {
                            unsetAutocomplete(p_key);
                            response($.map(result, function (item) {
                                return {
                                    label: item.fullnameall,
                                    value: item.fullnameall,
                                    id: item.id,
                                    parent_id: item.parent_id,
                                    kladr_code: item.kladr_code,
                                    level: item.level,
                                    name: item.name,
                                    house: item.house,
                                    fullname: item.fullname,
                                    buildnum: item.buildnum,
                                    strucnum: item.strucnum,
                                    postalcode: item.postalcode,
                                    house_id: item.house_id
                                };
                            }));
                        },
                        error: function (msg) {
                            unsetAutocomplete(p_key);
                        }
                    });
                },
// selected item from the list 
                select: function (event, ui) {
                    clear_flds_below(0);
                    set_blank_flds(ui.item.id);
                    set_house_flds(ui.item.house_id, ui.item.house, ui.item.buildnum, ui.item.strucnum, ui.item.postalcode);
                    set_fullname_val(ui.item.value, ui.item.id);
                    init_var_house(ui.item.fullname);
                    init_var_room(ui.item.value);
                },
                autoFocus: false,
                delay :500,
                minLength: 0
            });
            /*            });*/
        };


// This code is used for filling in additional attributes while item is selected in the pop-up window
        var set_blank_flds = function (p_id, p_house_id) {
            var field = _GLOBAL["fields"];
            var hfld = _GLOBAL["hfields"];
            if (empty(p_id)) return;
            if (empty(p_house_id)) {
                p_house_id = '%';
            }

            for (key in field) {
                setAutocomplete(key);
            }
            for (key in hfld) {
                setAutocomplete(_key + key);
            }

            jQuery.ajax({
                url: "index.php?module=FiasAddrObj&action=FiasGetAddressTree&to_pdf=1",
                type: "POST",
                data: {id: encodeURIComponent(p_id),
                    house_id: encodeURIComponent(p_house_id)
                },
                dataType: "json",
                success: function (result) {
                    var field = _GLOBAL["fields"];
                    for (key in  result["level"]) {
                        for (k in  field) {
                            var id_val = document.getElementById(k).value;
                            if (typeof (result["level"]) === 'object') {
                                if (field[k]["level"] == result["level"][key]) {
                                    if (empty(id_val)) {
                                        document.getElementById(field[k]["id_name"]).value = result["vid"][key];
                                        field[k]["id"] = result["vid"][key];
                                        field[k]["parent_id"] = result["parent_id"][key];
                                        field[k]["kladr_code"] = result["kladr_code"][key];
                                        field[k]["fullname"] = result["fullname"][key];
                                        document.getElementById(k).value = result["name"][key];
                                        // 

                                        if (!empty(result["house_id"][key])) {
                                            set_house_flds(result["house_id"][key], result["house"][key], result["buildnum"][key], result["strucnum"][key], '');
                                            init_var_house(field[k]["fullname"]);
                                        }

                                    }
                                }
                            }
                            else {
                                if (field[k]["level"] == result["level"]) {
                                    if (empty(id_val)) {
                                        document.getElementById(field[k]["id_name"]).value = result["vid"];
                                        field[k]["id"] = result["vid"];
                                        field[k]["parent_id"] = result["parent_id"];
                                        field[k]["kladr_code"] = result["kladr_code"];
                                        field[k]["fullname"] = result["fullname"];
                                        document.getElementById(k).value = result["name"];
                                        // 

                                        if (!empty(result["house_id"])) {
                                            set_house_flds(result["house_id"], result["house"], result["buildnum"], result["strucnum"], '');
                                            init_var_house(field[k]["fullname"]);
                                        }

                                    }
 

                                }
                            }


                            unsetAutocomplete(k);
                        }
                    }
                    for (key in hfld) {
                        unsetAutocomplete(_key + key);
                    }


                },
                error: function (msg,status,error) {
                     alert("An error occurred: " + status + "nError: " + error);
                    for (key in field) {
                        unsetAutocomplete(key);
                    }
                    for (key in hfld) {
                        unsetAutocomplete(_key + key);
                    }
                }
            });

        };

        var set_house_flds = function (p_house_id, p_house, p_buildnum, p_strucnum, p_postalcode) {
            var v_res = "";
            var v_val = "";
            var res = {"postcode": '', "res": ''};
            var v_id = p_house_id;
            var v_name = "";
            //clear_fias_address_house_flds();
            for (key in hfields) {
                v_name = "";
                switch (key) {
                    case "house" :
                        v_name = "д.";
                        v_val = p_house;
                        break;
                    case "buildnum" :
                        v_name = "корп.";
                        v_val = p_buildnum;
                        break;
                    case "strucnum" :
                        v_name = "стр.";
                        v_val = p_strucnum;
                        break;
                    case "postalcode" :
                        v_val = p_postalcode;
                        break;
                    case "room" :
                        v_val = "";
                        break;
                }
                if (!empty(v_val)) {
                    $('#' + _key + key).val(v_val);
                    $('#' + _key + key + "_id").val(p_house_id);
                    if (key != "postalcode") {
                        v_res = v_res + ', ' + v_name + v_val;
                    }
                }
            }
            res["postalcode"] = p_postalcode;
            res["house"] = v_res;
            return res;
        };

// This code is a call_back_function of displayParams parameter that is bonded with all address items
        var callback_address = function (popup_reply_data) {
            var name_to_value_array = popup_reply_data.name_to_value_array;
            var field = _GLOBAL["fields"];
            var v_lv;
            for (key in name_to_value_array) {
// save results of callback function
                if (key.indexOf(_key) >= 0) {
                    field[key]['parent_id'] = name_to_value_array['parent_id'];
                    field[key]['id'] = name_to_value_array['id'];
                    field[key]['kladr_code'] = name_to_value_array['kladr_code'];
                    field[key]['fullname'] = name_to_value_array['fullname'];

                    $('#' + field[key]['id_name']).val(name_to_value_array['id']);
                    $('#' + key).val(name_to_value_array[key]);

                    set_fullname_val(name_to_value_array['fullname'], name_to_value_array['id']);

                    v_lv = field[key]['level'];

                    // call ajax function to fill in bank fields with the lower level than the current.
                    set_blank_flds(field[key]['parent_id']);
                    //
                    clear_flds_below(v_lv);
                }
            }
        };


// This code is a call_back_function of displayParams parameter that is bonded with all address items
        var callback_address_house = function (popup_reply_data) {
            var v_ar = popup_reply_data.name_to_value_array;
            clear_fias_address_house_flds();
            v_res = set_house_flds(v_ar['id'], v_ar['house'], v_ar['buildnum'], v_ar['strucnum'], v_ar['postalcode']);
            // full address
            init_var_house(v_ar['fullname']);
            set_fullname_val(v_res["postalcode"] + v_ar['fullname'] + v_res["house"]);
            init_var_room($('#' + _key + 'fullname').val());
        };

        //
        // Constructor
        //
        var constructor_obj = function () {
            var field = _GLOBAL["fields"];
            for (key in field) {
                AddAutocomplete(key);
            }
            // Autocompleting house fields
            for (k in hfields) {
                if (k != 'room' && k != 'postalcode')
                    AddAutoComHouse(_key + k);
            }

            CompleteFullName(_key + "fullname");
            if (!empty($('#' + _key + 'fullname_id').val())) {
                set_blank_flds($('#' + _key + 'fullname_id').val(), $('#' + _key + 'house_id').val());
            }
            // removing the flat number if it exists 
            init_var_room($('#' + _key + 'fullname').val().replace(", кв." + $('#' + _key + 'room').val(), ""));

            // An event that fills in a room/office in the fullname string
            $('#' + _key + 'room').on('keyup', function () {
                if (empty($('#' + _key + 'room').val())) {
                    set_fullname_val(hfields["room"]);
                }
                else
                    set_fullname_val(hfields["room"] + ', кв.' + $('#' + _key + 'room').val());
            });
        };
        //


        // Public variables
        var copy_all_vars = function (p_obj) {
            var field = _GLOBAL["fields"];
            for (key in field) {
                o_key = p_obj._key + key.replace(_key, "");
                field[key]["id"] = p_obj._GLOBAL["fields"][o_key]["id"];
                field[key]["parent_id"] = p_obj._GLOBAL["fields"][o_key]["parent_id"];
                field[key]["kladr_code"] = p_obj._GLOBAL["fields"][o_key]["kladr_code"];
                field[key]["fullname"] = p_obj._GLOBAL["fields"][o_key]["fullname"];
            }
            var p_ar = p_obj.hfields;
            for (k in p_ar) {
                hfields[k] = p_ar[k];
            }
        };

        this.copy_all_vars = copy_all_vars;
        this._key = _key;
        this._GLOBAL = _GLOBAL;
        this.hfields = hfields;
        // Public functions
        this.callback_address_house = callback_address_house;
        this.form_id = form_id;
        this.empty = empty;
        this.return_url = return_url;
        this.return_url_house = return_url_house;
        this.AddAutocomplete = AddAutocomplete;
        this.AddAutoComHouse = AddAutoComHouse;
        this.CompleteFullName = CompleteFullName;
        this.callback_address = callback_address;
        this.clear_fias_address_flds = clear_fias_address_flds;
        this.clear_fias_address_house_flds = clear_fias_address_house_flds;
        this.set_blank_flds = set_blank_flds;
        this.constructor_obj = constructor_obj;

        // Calling the constructor ...
        Event.onAvailable(_key + "country", this.constructor_obj, this);
    };
})();

(function () {
    var Dom = YAHOO.util.Dom, Event = YAHOO.util.Event;
    SUGAR.AddressFieldA = function (checkId, fromKey, toKey) {
        this.fromKey = fromKey;
        this.toKey = toKey;
        Event.onAvailable(checkId, this.testCheckboxReady, this);
    };
    SUGAR.AddressFieldA.prototype =
            {elems: ["country", "region", "autonomy", "district", "city", "citycode", "street", "fullname",
                    "village", "house", "postalcode", "buildnum", "strucnum", "room"],
                // fields that are needed to be compared
                compelem: ["fullname", "fullname_id", "house", "house_id", "postalcode", "postalcode", "room"],
                tSkipInit: false,
                tHasText: false,
                syncAddressCheckbox: true,
                originalBgColor: '#FFFFFF',
                removeListener: function (elem, event, func, obj) {
                    var arr = [];
                    var j = 0;
                    var listeners = YAHOO.util.Event.getListeners(elem);
                    // store useful events
                    for (var i = 0; i < listeners.length; ++i) {
                        var listener = listeners[i];
                        if (listener.obj.toKey != obj.toKey) {
                            arr[j] = listener;
                            j++;
                        }
                    }
                    // remove all events
                    while (Event.removeListener(elem, event, func)) {
                        ;
                    }
                    // repair useful events
                    for (var i = 0; i < arr.length; ++i) {
                        var listener = arr[i];
                        Event.addListener(elem, event, arr[i].fn, arr[i].obj, true);
                    }
                },
                skipChecking: function (fromEl, toEl, p_checkbox) {
                    var fk = fromEl;
                    var tk = toEl;
                    var v_chk = _Global_Obj;
                    var v_skip = false;
                    for (key in v_chk) {
                        if (key != tk + "_" + fk) {
                            if (v_chk[key].checked == true && v_chk[tk + "_" + fk].fromEl == v_chk[key].toEl) {
                                v_skip = true;
                            }
                            /* if (v_chk[tk + "_" + fk].checked)
                             v_skip = true;*/
                            if (v_chk[tk + "_" + fk].toEl == v_chk[key].toEl && v_chk[key].checked == true)
                                v_skip = true;
                            if (v_chk[tk + "_" + fk].toEl == v_chk[key].fromEl && v_chk[key].checked == true)
                                v_skip = true;


                        }
                    }
                    if (v_skip) {
                        p_checkbox.checked = false;
                        v_chk[tk + "_" + fk].checked = p_checkbox.checked;
                        return true;
                    }
                    return false;
                }
                ,
                testCheckboxReady: function (obj) {
                    if (obj.skipChecking(obj.fromKey, obj.toKey, Dom.get(this.id))) {
                        return;
                    }

                    for (var x in obj.compelem) {
                        var f = obj.fromKey + "_" + obj.compelem[x];
                        var t = obj.toKey + "_" + obj.compelem[x];
                        var e1 = Dom.get(t);
                        var e2 = Dom.get(f);
                        if (e1 != null && typeof e1 != "undefined" && e2 != null && typeof e2 != "undefined") {
                            if (!obj.tHasText && YAHOO.lang.trim(e1.value) != "") {
                                obj.tHasText = true;
                            }
                            if (e1.value != e2.value)
                            {
                                obj.syncAddressCheckbox = false;
                                break;
                            }
                            obj.originalBgColor = e1.style.backgroundColor;
                        }
                    }

                    if (obj.tHasText && obj.syncAddressCheckbox)
                    {
                        obj.tSkipInit = true;
                        Dom.get(this.id).checked = true;
                        obj.syncFields();
                        obj.tSkipInit = false;
                    }
                }, writeToSyncField: function (e) {
                    var fromEl = Event.getTarget(e, true);
                    var tag = e.currentTarget;
                    if (typeof fromEl != "undefined") {
                        var toEl = Dom.get(fromEl.id.replace(this.fromKey, this.toKey));
                        // if button was pressed
                        if (typeof tag != "undefined")
                            if (tag.type == 'button') {
                                if (tag.id.substr(0, 8) == 'btn_clr_') {
                                    fromEl = Dom.get(tag.id.replace('btn_clr_', ""));
                                    toEl = Dom.get(fromEl.id.replace('btn_clr_', '').replace(this.fromKey, this.toKey));
                                }
                            }

                        var update = toEl.value != fromEl.value;
                        toEl.value = fromEl.value;
                        if (update)
                            this.syncFields();
                    }
                }, syncFields: function (fromKey, toKey) {
                    var fk = this.fromKey, tk = this.toKey;
                    var v_chk = _Global_Obj;
                    var v_checkbox = Dom.get(tk + '_' + fk + '_checkbox');
                    if (_Global_Obj === 'undefined') {
                        return; //"Error: Not defined _Global_Obj varible";
                    }
                    if (v_checkbox.checked)
                        if (this.skipChecking(this.fromKey, this.toKey, v_checkbox)) {
                            return;
                        }
                    // Checking if it is possible to copy fields

                    for (var x in this.elems) {
                        var f = fk + "_" + this.elems[x];
                        var e2 = Dom.get(f);
                        var e2_id = Dom.get(f + "_id");
                        var t = tk + "_" + this.elems[x];
                        var e1 = Dom.get(t);
                        var e1_id = Dom.get(t + "_id");
                        var btn = Dom.get("btn_clr_" + t);
                        var btn2 = Dom.get("btn_clr_" + f);
                        if (e1 != null && typeof e1 != "undefined" && e2 != null && typeof e2 != "undefined") {
                            // it is not allowed to copy from readonly items
                            if (e2.readOnly) {
                                v_checkbox.checked = false;
                                return;
                            }
                            if (!v_checkbox.checked) {
                                Dom.setStyle(e1, 'backgroundColor', this.originalBgColor);
                                if (btn != null && typeof btn != "undefined") {
                                    btn.removeAttribute('disabled');
                                }
                                e1.removeAttribute('readOnly');

                                if (btn2 != null && typeof btn2 != "undefined")
                                    this.removeListener(btn2, 'click', this.writeToSyncField, this);

                                this.removeListener(e2, 'focusout', this.writeToSyncField, this);
                            } else {
                                var update = e1.value != e2.value;
                                if (!this.tSkipInit) {
                                    e1.value = e2.value;
                                    if (e1_id != null && typeof e1_id != "undefined" && e2_id != null && typeof e2_id != "undefined") {
                                        e1_id.value = e2_id.value;
                                    }
                                }
                                if (update)
                                    SUGAR.util.callOnChangeListers(e1);
                                Dom.setStyle(e1, 'backgroundColor', '#DCDCDC');
                                if (btn != null && typeof btn != "undefined") {
                                    btn.setAttribute('disabled', true);
                                }
                                e1.setAttribute('readOnly', true);
                                Event.addListener(e2, 'focusout', this.writeToSyncField, this, true);
                                if (btn2 != null && typeof btn2 != "undefined")
                                    Event.addListener(btn2, 'click', this.writeToSyncField, this, true);
                            }
                        }
                    }
                    // disable other checkboxes ...
                    var el = $('input[group ="' + tk + '_checkbox"]');
                    el.not(v_checkbox).prop('checked', false);
                    v_chk[tk + "_" + fk].checked = v_checkbox.checked;
                    // if checkbox is selected
                    if (Dom.get(tk + '_' + fk + '_checkbox').checked && this.tSkipInit == false) {
                        var t = tk + "_address";
                        var f = fk + "_address";
                        var tmpFunc = v_chk[tk + "_" + fk].aobj;
                        var fobj = function (p_f) {
                            for (key in v_chk) {
                                if (v_chk[key].name = p_f)
                                    return v_chk[key].aobj
                            }
                            return null;
                        }
                        if (fobj != null)
                            tmpFunc.copy_all_vars(fobj(f));
                    }
                }
            };
})();