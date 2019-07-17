<?php

$debug=0;
if(file_exists("debug.ini")){
    $debug=1;
}


$opt = $_GET["opt"];
switch($opt){
    case "del":{
        del_opt();
        break;
    }
}

function del_opt(){
    $id = $_GET["id"];
    $sticky_data = json_decode(file_get_contents("sticky.json"));
    for($i=0;$i<sizeof($sticky_data);$i++){
        if($i>=$id){
            
        }
    }

    
    file_put_contents("sticky.json",json_encode($sticky_data));
}

if($debug){
    print_r($_GET);
    print("<br>");
    print_r(file_get_contents("sticky.json"));
}