function createStickyTable(data){
    for(item in data){
        console.log(data[item].id);
        console.log(data[item].sticky);
        console.log(data[item].time);
        console.log(data[item].ip);
        var tr=document.createElement("tr");
        var td_id=document.createElement("td");
        td_id.appendChild(document.createTextNode(data[item].id));
        var td_sticky=document.createElement("td");
        td_sticky.appendChild(document.createTextNode(data[item].sticky));
        var td_time=document.createElement("td");
        td_time.appendChild(document.createTextNode(data[item].time));
        var td_ip=document.createElement("td");
        td_ip.appendChild(document.createTextNode(data[item].ip));
        var td_opt=document.createElement("td");
        var a_opt=document.createElement("a");
        var a_opt_href="sticky.php?operate=del&id="+data[item].id;
        console.log(a_opt_href);
        a_opt.setAttribute("href",a_opt_href);
        a_opt.appendChild(document.createTextNode("del"));
        td_opt.appendChild(a_opt);
        tr.appendChild(td_id);
        tr.appendChild(td_sticky);
        tr.appendChild(td_time);
        tr.appendChild(td_ip);
        tr.appendChild(td_opt);
        $("#stickyList").append(tr);
    }
}