let getCurrentAddress = function () {
    return window.location.protocol + '//' + window.location.host + window.location.pathname;
}
let toBool = function (str) {
    if (str == 'true') {
        return true;
    } else {
        return false;
    }
}
let init = function () {
    if (localStorage.getItem('inited') != 1) {
        localStorage.setItem('inited', 1);
        localStorage.setItem('api_list_show_Sticky', 'true');
        localStorage.setItem('api_list_show_tabSync', 'true');
        localStorage.setItem('api_list_show_toDoList', 'true');
    }
}
init();

new Vue({
    el: "#api_panel",
    data: {
        this_address: getCurrentAddress(),
        api_list: [
            {
                title: "Sticky",
                show_list: toBool(localStorage.getItem('api_list_show_Sticky')),
                list: [
                    { api_name: "index", method: "GET", routes: "v2/sticky", details: "have no upload data display index page" },
                    { api_name: "get sticky", method: "GET√ POST", routes: "v2/sticky/get", details: "send request:<br>GET: ?id=1&id=2<br>POST: json array string [1,2]<br>auth: header with AuthKey and DevName<br>return: json array string<br>for one or multilines" },
                    { api_name: "add sticky", method: "GET POST√", routes: "v2/sticky/add", details: "send request:<br>GET: ?title=TITLE&con=CON for one line<br>POST: json string [['title','con'],['title','con']] for multilines<br>auth: header with AuthKey and DevName<br>return: 1 or 0" },
                    { api_name: "del sticky", method: "GET DEL POST", routes: "v2/sticky/del", details: "send request:<br>GET: ?id=1&id=2&id=3<br>post json array string: [1,2,3]<br>auth: header with AuthKey and DevName" },
                    { api_name: "data table", method: "Sticky", routes: "none", details: "id title con time devname" }
                ]
            },
            {
                title: "tabSync",
                show_list: toBool(localStorage.getItem('api_list_show_tabSync')),
                list: [
                    { api_name: "index", method: "GET", routes: "v2/tabSync", details: "have no upload data display index page" },
                    { api_name: "get tabSync", method: "GET√ POST", routes: "v2/tabSync/get", details: "send request:<br>GET: ?id=1&id=2<br>POST: json array string [1,2]<br>auth: header with AuthKey and DevName<br>return: json array string<br>for one or multilines" },
                    { api_name: "add tabSync", method: "GET POST√", routes: "v2/tabSync/add", details: "send request:<br>GET: ?title=TITLE&con=CON for one line<br>POST: json string [['title','con'],['title','con']] for multilines<br>auth: header with AuthKey and DevName<br>return: 1 or 0" },
                    { api_name: "del tabSync", method: "GET DEL POST", routes: "v2/tabSync/del", details: "send request:<br>GET: ?id=1&id=2&id=3<br>post json array string: [1,2,3]<br>auth: header with AuthKey and DevName" },
                ]
            },
            {
                title: "toDoList",
                show_list: toBool(localStorage.getItem('api_list_show_toDoList')),
                list: [
                    { api_name: "get toDoList", method: "GET√ POST", routes: "v2/toDoList/get", details: "send request:<br>GET: ?id=1&id=2<br>POST: json array string [1,2]<br>auth: header with AuthKey and DevName<br>return: json array string<br>for one or multilines" },
                    { api_name: "add toDoList", method: "GET POST√", routes: "v2/toDoList/add", details: "send request:<br>GET: ?title=TITLE&con=CON for one line<br>POST: json string [['title','con'],['title','con']] for multilines<br>auth: header with AuthKey and DevName<br>return: 1 or 0" },
                    { api_name: "del toDoList", method: "GET DEL POST", routes: "v2/toDoList/del", details: "send request:<br>GET: ?id=1&id=2&id=3<br>post json array string: [1,2,3]<br>auth: header with AuthKey and DevName" },
                ]
            }
        ]
    },
    methods: {
        hide_toggle(i) {
            this.api_list[i].show_list = !this.api_list[i].show_list;
            localStorage.setItem('api_list_show_' + this.api_list[i].title, this.api_list[i].show_list);
        }
    }
});