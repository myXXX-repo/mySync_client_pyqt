<?php

$debug=0;
if(file_exists("debug.ini")){
    $debug=1;
}


//1.del
$opt = $_GET["option"];
switch($opt){
    case "del":{
        del_opt();
        break;
    }
}

function del_opt(){
    if(file_exists(("sticky.json"))){
        $id = $_GET["id"];
        $sticky_data = json_decode(file_get_contents("sticky.json"));
        $new_sticky_data=array();
        //$id = $_GET["id"];
        for($i=0;$i<count($sticky_data);$i++){
            if($i==$id){
                //$i++;
            }
            else{$new_sticky_data[]=$sticky_data[$i];}
        }
        file_put_contents("sticky.json",json_encode($new_sticky_data));
        global $debug;
        if($debug==0){
            print("<script>window.location.href=\"index.php\"</script>");
        }
    }else{
        die("have no file of sticky.json");
    }
}

if($debug){
    print_r($_GET);
    print("<br>");
    print_r(file_get_contents("sticky.json"));
}