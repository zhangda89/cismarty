var parent = new Array();
if (typeof (areas) != 'undefined') {
    for (i in areas) {
        try {
            var parentid = areas[i][1];
        } catch (e) {
            //try catch,for opera
        }
        if (!parent[parentid]) {
            parent[parentid] = new Array();
        }
        parent[parentid][parent[parentid].length] = i;
    }
}

function addAreas(parentid, selectid, defaultid, hasFirst, isCascade) {
    var obj = getObj(selectid);
    if (!obj)
        return false;
    if (!defaultid)
        defaultid = -1;
    var s = 0;
    if (hasFirst) {
        obj.options[0] = new Option('请选择', '');
        s = 1;
    }


    if (parent[parentid]) {

        for (var i = 0; i < parent[parentid].length; i++) {
            var areaId = parent[parentid][i];
            obj.options[s] = new Option(areas[areaId][0], areaId);
            if (defaultid && defaultid == areaId) {
                obj.options[s].selected = true;
            }
            s++;
        }
    }
    if (isCascade) {
        var selects = obj.parentNode.getElementsByTagName("select");
        var current;
        for (var x = 0; x < selects.length; x++) {
            if (selects[x].id == selectid)
                current = x;
        }
        var lastAreaId = obj.value;
        if (typeof(selects[current].onclick) == 'function' && selects[current])
            selects[current].onclick(selects[current]);
        for (var y = current + 1; y < selects.length; y++) {
            if (selects[y] && parent[lastAreaId]) {
                for (var z = 0; z < parent[lastAreaId].length; z++) {
                    var otherAreaId = parent[lastAreaId][z];
                    selects[y].options[z] = new Option(areas[otherAreaId][0], otherAreaId);
                }
            }
            if (typeof(selects[y].onclick) == 'function' && selects[y])
                selects[y].onclick(selects[y]);
        }
    }
}

function changeSubArea(parentid, id, selectvalue, hasFirst, isCascade) {
    var obj = getObj(id);
    if (parentid < -1 || !obj)
        return false;
    clearAreas(id, hasFirst);
    addAreas(parentid, id, selectvalue, hasFirst, isCascade);
}

function clearAreas(id, hasFirst) {
    var obj = getObj(id);
    var selects = obj.parentNode.getElementsByTagName("select");
    var current;
    for (var i = 0; i < selects.length; i++) {
        if (selects[i].id == id)
            current = i;
    }
    for (var y = current; y < selects.length; y++) {
        for (var z = selects[y].length - 1; z >= 0; --z) {
            selects[y].remove(z);
        }
        if (hasFirst) {
            selects[y].options[0] = new Option('请选择', '');
            //selects[y].value = 0;
            selects[y].options[0].selected = true;
        }
    }
}

function delArea(areaId, position) {
    if (confirm("是否确认删除")) {
        var parentid = $("#parentid").val();
        var province = $("#province_areas").val();
        var city = $("#city_areas").val();
        var provinceid = $("#provinceid").val();

        var ob_R = {
            'parentid': parentid,
            'province': province,
            'city': city,
            'provinceid': provinceid,
            'id': areaId
        };
        ajaxurl = tpl_replace(ajaxurl, ob_R);
        location.href = ajaxurl;
    }
}

function addArea() {
    var modes = getObj('areaMode').firstChild.cloneNode(true);
    getObj('modes').appendChild(modes);
}


function countrySelect(parentid, type, hasFirst) {
    if (typeof (areas) == 'undefined')
        return false;
    changeSubArea(parentid, type, hasFirst);
    if (parentid == '-1') {
        parentid = (type == '') ? getObj('provinceid').value : 0;
    }

    var areasHtml = dataList(parent, parentid, areas);
    if (type != '')
        getObj('provinceid').value = parentid;
    getObj('parentid').value = parentid;
    getObj('createareas').innerHTML = areasHtml;
}
function provinceSelect(parentid) {
    if (typeof (areas) == 'undefined')
        return false;
    var areasHtml = dataList_cb(parent, parentid, areas);
    return areasHtml;
}
function dataList_cb(parents, parentid, Datas) {
    var buildHtml = '';
    if (parents[parentid]) {
        for (var i = 0; i < parents[parentid].length; i++) {
            var areaId = parents[parentid][i];
            var str = '';
            if (_inputHiddenValue != '' && typeof(_inputHiddenValue) == 'object') {
                if (_inputHiddenValue.in_array(areaId))
                    str = 'checked';
            }
            buildHtml += '<li id="area_' + areaId + '"><label>';
            buildHtml += '<input type="checkbox"  ' + str + ' rel="' + Datas[areaId][0] + '" name="areas" value="' + areaId + '"> ' + Datas[areaId][0] + ' </dt>';
            buildHtml += '</lablel></li>';
        }
    }
    return buildHtml;
}


function dataList(parents, parentid, Datas) {
    var buildHtml = '';
    if (parents[parentid]) {
        for (var i = 0; i < parents[parentid].length; i++) {
            var areaId = parents[parentid][i];
            buildHtml += '<dl class="cc" id="area_' + areaId + '">';
            buildHtml += '<dt><input type="text" class="input input_wd" name="areas[' + areaId + '][vieworder]" value="' + Datas[areaId][2] + '"></dt>';
            buildHtml += '<dd><input name="areas[' + areaId + '][name]" type="text" class="input input_wa" value="' + Datas[areaId][0] + '" /></dd>';
            buildHtml += '<dd><a href="javascript:;" onclick="delArea(' + areaId + ',this);" class="mr20">[删除]</a></dd>';
            buildHtml += '</dl>';
        }
    }
    return buildHtml;
}

function init() {
    if (typeof (initValues) == 'undefined' || initValues.length < 1)
        return false;
    for (var i = 0; i < initValues.length; i++) {
        addAreas(initValues[i].parentid, initValues[i].selectid, initValues[i].defaultid, initValues[i].hasfirst, false);
    }
}
setTimeout('init()', 100);