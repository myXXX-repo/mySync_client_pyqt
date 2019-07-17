<?php
/*
require "./Mdeoo.php";
use Medoo\Medoo;

//database config set
$database_info = array();
$database_info["servertype"]="";
$database_info["serverhost"]="";
$database_info["username"]="";
$database_info["password"]="";

function con_sql(){
    return new Medoo([

    ]);
}*/
//数据类型
//sticky 便利贴 谁都能看 谁都能删除
$debug=0;
if(file_exists("debug.ini")){
    $debug=1;
}
if($debug){
    print("\$_POST: ");
    print_r($_POST);
    print("<br>");
}

//$type = 0;
//0 no data
//1. sticky
//2. msg
//3. file

if(isset($_POST["type"])){
    switch($_POST["type"]){
        case "sticky":{
            sticky_section();
            break;
        }
        case "msg":{
            break;
        }
        case "file":{
            break;
        }
    }
}else{
    die("no data of type");
}


function sticky_section(){
    if(!isset($_POST["devname"])){
        die("stop with no sender's devname<br>");
    }
    if(!isset($_POST["sticky"])){
        die("stop with no sticky date<br>");
    }

    $data = array();
    $data["devname"]=$_POST["devname"];
    $data["sticky"]=$_POST["sticky"];
    $data["date"]=date("Y-m-d H:i:s");

    
    if(file_exists("sticky.json")){
        $data_org_json = file_get_contents("sticky.json");
        $data_org = json_decode($data_org_json);
        $data_org[]=$data;
        //print_r($data_org);
        $data_org_json = json_encode($data_org);
        file_put_contents("sticky.json",$data_org_json);
    }else{
        $data_array[0]=$data;
        $data_json = json_encode($data_array);
        file_put_contents("sticky.json",$data_json);
    }
}

