$(document).ready(function () {
    var curtab_extended = 0;
    var listTable_extended = 0;
    addListTable();
    $('#cur_btn').mouseover(function () {
        if (curtab_extended == 1) {
            return;
        }
        chrome.tabs.getSelected(null, function (tab) {
            // if (listTable_extended == 0) {
            //     addListTable();
            //     listTable_extended = 1;
            // }
            addCurTabToTable(tab.title, tab.url)
            curtab_extended = 1;
            console.log(tab.url, tab.title)
        });
    });

    $('#btn3').mouseover(function () {
        // if(listTable_extended==0){
        //     addListTable();
        //     listTable_extended=1;
        // }
    
        sendData(getServAddress_getLastTab(),"1");
    });
});



$('#btn1').click(function () {
    sendCurTab();
});

$('#btn4').click(function () {
    window.open('options.html');
})


var sendCurTab = function () {
    // alert('adfgeiuyghbn,');
    chrome.tabs.getSelected(null, function (tab) {
        var title = tab.title;
        var url = tab.url;
        var node = Array();
        node[0] = title;
        node[1] = url;
        var list = Array();
        list[0] = node;
        var json = listToJson(list);
        sendData(getServAddress_addOneTab(),json);
        console.log(json);
    });
}

//array to json
var listToJson = function (list) {
    json = "[";
    list.forEach(element => {
        json += nodeToJson(element[0], element[1]);
    });
    json += "]";
    return json;
}

//node to json
var nodeToJson = function (title, url) {
    return "[\"" + title + "\",\"" + url + "\"]";
}

//send post request to addOneTab
var sendData = function (address,data) {
    // console.log("json", data);
    $.post(address, { 'key': getKey(), 'devname': getDevName(), 'data': data }, function (data, status) {
        console.log(status);
        console.log(data);
        if (status == 'success') {
            var tr_sendStatus = document.createElement('tr');
            var td_sendStatus = document.createElement('td');
            var div_sendStatus = document.createElement('div');
            div_sendStatus.setAttribute('class', 'blank');
            var p_sendStatus = document.createElement('p');
            p_sendStatus.setAttribute('class', 'blank_text');
            p_sendStatus.appendChild(document.createTextNode("send " + status));
            p_sendStatus.setAttribute('style', 'background-color:#a4f88c');

            div_sendStatus.appendChild(p_sendStatus);
            td_sendStatus.appendChild(div_sendStatus);
            tr_sendStatus.appendChild(td_sendStatus);
            $('#curtab_url').after(tr_sendStatus);
        }
    });
}

//data prepare
var getServAddress_getAllTabs = function(){
    return getServAddress()+"/getAllTabs";
}

var getServAddress_getLastTab = function(){
    return getServAddress()+"/getLastTab";
}

var getServAddress_delOneTab =function(){
    return getServAddress()+"/delOneTab";
}

var getServAddress_clearTabs = function(){
    return getServAddress()="/clearTabs";
}

var getServAddress_addOneTab = function(){
    return getServAddress()+"/addOneTab";
}
var getServAddress = function () {
    var servAddress = localStorage.getItem("servAddress");
    console.log(servAddress);
    return servAddress;
}
var getKey = function () {
    var key = localStorage.getItem("key");
    console.log(key);
    return key;
}
var getDevName = function () {
    var devname = localStorage.getItem("devname");
    console.log(devname);
    return devname;
}

var addListTable = function () {
    var listtable = document.createElement('div');
    listtable.setAttribute('class', 'listTable');
    listtable.setAttribute('id', 'listTable');
    listtable.setAttribute('style', 'width:255px;height:110px;');
    $('#list').append(listtable);
}

var addCurTabToTable = function (title, url) {
    if (title.length > 25) {
        title = title.substr(0, 25);
        title += "...";
    }
    if (url.length > 30) {
        url = url.substr(0, 27);
        url += "...";
    }

    var tr_title = document.createElement('tr');
    var td_title = document.createElement('td');
    var div_title = document.createElement('div');
    var p_title = document.createElement('p');

    tr_title.setAttribute('id', 'curtab_title');
    div_title.setAttribute('class', 'blank');
    p_title.setAttribute('class', 'blank_text');

    p_title.appendChild(document.createTextNode(title));

    div_title.appendChild(p_title);
    td_title.appendChild(div_title);
    tr_title.appendChild(td_title);

    $('#listTable').append(tr_title);

    var tr_url = document.createElement('tr');
    var td_url = document.createElement('td');
    var div_url = document.createElement('div');
    var p_url = document.createElement('p');

    tr_url.setAttribute('id', 'curtab_url');
    div_url.setAttribute('class', 'blank');
    p_url.setAttribute('class', 'blank_text');

    p_url.appendChild(document.createTextNode(url));

    div_url.appendChild(p_url);
    td_url.appendChild(div_url);
    tr_url.appendChild(td_url);

    $('#curtab_title').after(tr_url);

    $('#curtab_title').click(function () {
        sendCurTab();
    });
    $('#curtab_url').click(function () {
        sendCurTab();
    });
}

