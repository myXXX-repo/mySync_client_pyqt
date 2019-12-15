var getServAddress = function() {
    return localStorage.getItem('servAddress');
}
var getServAddress_getAllTabs = function() {
    return getServAddress() + "/getAllTabs";
}
var getServAddress_getLastTab = function() {
    return getServAddress() + "/getLastTab";
}
var getServAddress_delOneTab = function() {
    return getServAddress() + "/delOneTab";
}
var getServAddress_clearTabs = function() {
    return getServAddress() + "/clearTabs";
}
var getServAddress_addOneTab = function() {
    return getServAddress() + "/addOneTab";
}
var getServAddress_sendAllTabs = function() {
    return getServAddress() + "/addTabs";
}
var getDevname = function() {
    return localStorage.getItem('devname');
}
var getKey = function() {
    return localStorage.getItem('key');
}

var nodeToJson = function(title, url) {
    return "[\"" + title + "\",\"" + url + "\"]";
}
var listToJson = function(list) {
    json = "[";
    var lastNode = list.pop();
    list.forEach(element => {
        json += nodeToJson(element[0], element[1]);
        json += ',';
    });
    json += nodeToJson(lastNode[0], lastNode[1]);
    json += "]";
    return json;
}

var cutString = function(str, LIMIT, LENGTH) {
    if (str.length > LIMIT) {
        return str.substr(0, LENGTH) + "...";
    }
    return str;
}

var setOtherListDisplayNone = function(id) {
    $('#' + id).show();
    var list = ['nothing', 'current_tab_list', 'sendAllTabs_status', 'getAll_tabs_list', 'getLast_tab_list', 'settings'];
    list.forEach(element => {
        if (element != id) {
            $('#' + element).hide();
        }
    });
}

var setThisListBlank = function(id) {
    $('#' + id).empty();
}

var createListByIdByTwoArgv = function(id, titlestr, urlstr, HREF_ON = 1,QRCODE_ON=0) {
    var title = document.createElement('div');
    title.appendChild(document.createTextNode(cutString(titlestr, 30, 30)));
    var url = document.createElement('div');
    if (HREF_ON == 1) {
        var urla = document.createElement('a');
        urla.setAttribute('href', urlstr);
        urla.appendChild(document.createTextNode(cutString(urlstr, 30, 30)));
        urla.setAttribute('target','_blank');
        url.appendChild(urla);
    } else {
        url.appendChild(document.createTextNode(cutString(urlstr, 30, 30)));
    }
    var card = document.createElement('div');
    card.setAttribute('class','card');
    card.setAttribute('id',urlstr);
    card.appendChild(title);
    card.appendChild(url);
    if(QRCODE_ON==1){
            var qr_doce_div = document.createElement('div');
            qr_doce_div.setAttribute('style','margin-top:7px;border:5px solid white;width:100px;');
            var qrcode = new QRCode(qr_doce_div,{width:100,height:100});
            qrcode.makeCode(urlstr);
            card.appendChild(qr_doce_div);
        }
    $('#' + id).append(card);
}

var AddCurrentTabToList = function() {
    chrome.tabs.getSelected(null, function(tab) {
        console.log('AddCurrentTabToList');
        createListByIdByTwoArgv('current_tab_list', tab.title, tab.url,1,1);
    });
}

var AddCurrentAllTabToList = function() {
    chrome.windows.getAll({ populate: true }, function(windows) {
        windows.forEach(function(window) {
            window.tabs.forEach(function(tab) {
                createListByIdByTwoArgv('sendAllTabs_status', tab.title, tab.url);
            });
        });
    });
}

$(document).ready(function() {
    $('#current_tab_list,#sendAllTabs_status,#getAll_tabs_list,#getLast_tab_list,#settings,#clear_all_tabs').hide();
});

var hideOtherList = function(id) {
    $('#' + id).show();
    var list = ['nothing', 'current_tab_list', 'sendAllTabs_status', 'getAll_tabs_list', 'getLast_tab_list', 'settings', 'clear_all_tabs'];
    list.forEach(element => {
        if (element != id) {
            $('#' + element).hide();
        }
    });
}

//button group 1
$('#btn1').mouseover(function() {
    setThisListBlank('current_tab_list');
    hideOtherList('current_tab_list');
    AddCurrentTabToList();
});

$('#btn1').click(function() {
    hideOtherList('current_tab_list');
    console.log('btn1 click');
    chrome.tabs.getSelected(null, function(tab) {
        $.post(
            getServAddress_addOneTab(), {
                'devname': getDevname(),
                'key': getKey(),
                'data': nodeToJson(tab.title, tab.url)
            },
            function(data, status) {
                console.log(data);
                console.log(status);
                var div = document.createElement('div');
                div.appendChild(document.createTextNode('success'));
                div.setAttribute('style', 'background-color:#a4f88c;');
                $('#current_tab_list').append(div);
            });
    });
});

//button group 2
$('#btn2').mouseover(function() {
    setThisListBlank('sendAllTabs_status');
    hideOtherList('sendAllTabs_status');
    AddCurrentAllTabToList();
});
$('#btn2').click(function() {
    hideOtherList('sendAllTabs_status');
    console.log('sendAllTabs_status');
    chrome.windows.getAll({ populate: true }, function(windows) {
        var list = Array();
        windows.forEach(function(window) {
            window.tabs.forEach(function(tab) {
                var node = Array();
                node[0] = tab.title;
                node[1] = tab.url;
                list.push(node);
            });
        });
        // console.log('this is ');
        // console.log(list);
        var list_json = listToJson(list);
        // console.log(list_json);
        $.post(getServAddress_sendAllTabs(), { 'key': getKey(), 'devname': getDevname(), 'data': list_json }, function(data, status) {
            // console.log(data);
            // console.log(status);
            var dataArray = JSON.parse(data);
            if (dataArray.operate_response == 'addTabs') {
                // console.log('sendAllTabs succeed');
                var successtag = document.createElement('div');
                successtag.appendChild(document.createTextNode('send success'));
                successtag.setAttribute('style', 'background-color:#a4f88c;margin-bottom:7px;height:20px;line-height:20px;padding-left:10px;');
                $('#sendAllTabs_status').children(':first').before(successtag)
                // .append(successtag);
            }
        });
    });
});

//button group 3
$('#btn3').mouseover(function() {
    console.log("getAllTabs");
    setThisListBlank('getAll_tabs_list');
    hideOtherList('getAll_tabs_list');
    $.post(getServAddress_getAllTabs(), { 'key': getKey(), 'devname': getDevname() }, function(data, status) {
        console.log(data);
        console.log(status);
        var dataArray = JSON.parse(data);
        var list = dataArray.operate_response;
        if (list == null || list == '0') {
            createListByIdByTwoArgv('getAll_tabs_list', "get none of data", "", 0)
            return;
        }
        list.forEach(element => {
            createListByIdByTwoArgv('getAll_tabs_list', element[0], element[1]);
        });
    });
});
$('#btn3').click(function() {
    console.log("getAllTabs");
    setThisListBlank('getAll_tabs_list');
    hideOtherList('getAll_tabs_list');
    $.post(getServAddress_getAllTabs(), { 'key': getKey(), 'devname': getDevname() }, function(data, status) {
        console.log(data);
        console.log(status);
        var dataArray = JSON.parse(data);
        var list = dataArray.operate_response;
        if (list == null || list == '0') {
            createListByIdByTwoArgv('getAll_tabs_list', "get none of data", "", 0)
            return;
        }
        list.forEach(element => {
            createListByIdByTwoArgv('getAll_tabs_list', element[0], element[1]);
        });
    });
});

//button group 4
$('#btn4').mouseover(function() {
    setThisListBlank('getLast_tab_list');
    hideOtherList('getLast_tab_list');
    $.post(getServAddress_getLastTab(), { 'key': getKey(), 'devname': getDevname() }, function(data, status) {
        console.log(data);
        console.log(status);
        var dataArray = JSON.parse(data);
        var item = dataArray.operate_response;
        if (item == null) {
            createListByIdByTwoArgv('getLast_tab_list', "get none of data", "", 0)
            return;
        }
        createListByIdByTwoArgv('getLast_tab_list', item[0], item[1]);
    });
});
$('#btn4').click(function() {
    setThisListBlank('getLast_tab_list');
    hideOtherList('getLast_tab_list');
    $.post(getServAddress_getLastTab(), { 'key': getKey(), 'devname': getDevname() }, function(data, status) {
        console.log(data);
        console.log(status);
        var dataArray = JSON.parse(data);
        var item = dataArray.operate_response;
        if (item == null) {
            createListByIdByTwoArgv('getLast_tab_list', "get none of data", "", 0)
            return;
        }
        createListByIdByTwoArgv('getLast_tab_list', item[0], item[1]);
    });
});

// button group 6
$('#btn6').mouseover(function() {
    setThisListBlank('clear_all_tabs');
    hideOtherList('clear_all_tabs');
    createListByIdByTwoArgv('clear_all_tabs', 'clearAll', 'click this button to del all tab data', 0);
});
$('#btn6').click(function() {
    setThisListBlank('clear_all_tabs');
    hideOtherList('clear_all_tabs');
    $.post(getServAddress_clearTabs(), { 'key': getKey(), 'devname': getDevname() }, function(data, status) {
        console.log(data);
        if (status == 'success') {
            var dataArray = JSON.parse(data);
            if (dataArray.operate_response == 'clearTabs') {
                createListByIdByTwoArgv('clear_all_tabs', 'clearAll', 'del all tabs data done', 0);
            }
        }
    });
});

//button group5
$('#btn5').mouseover(function() {
    hideOtherList('settings');
});

