<?php


require "./Medoo.php";
use Medoo\Medoo;

//database config set
$database_info = array();
$database_info["servertype"]="";
$database_info["serverhost"]="";
$database_info["username"]="";
$database_info["password"]="";
$database_info["dbname"]="";


function con_sql(){
    global $database_info;
    return new Medoo([
        'database_type' => $database_info["servertype"],
        'database_name' => $database_info["dbname"],
	    'server' => $database_info["serverhost"],
	    'username' => $database_info["username"],
	    'password' => $database_info["password"]
    ]);
}

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
//  devname sticky time
//2. msg
//  devname msg to file_name(choisable) file_locate(choisable) time ifread
//3. file
//  devname file_tag time

if(isset($_POST["type"])){
    switch($_POST["type"]){
        case "sticky":{
            sticky_section();
            break;
        }
        case "msg":{
            msg_section();
            break;
        }
        case "file":{
            file_section();
            break;
        }
        case "test":{
            test_section();
            break;
        }
    }
}else{
    die("no data of type");
}


function sticky_section(){
    //set store medthod
    $store_medthod="json";
    if(!isset($_POST["devname"])){
        die("stop with no sender's devname<br>");
    }
    if(!isset($_POST["sticky"])||$_POST["sticky"]==NULL){
        die("stop with no sticky date<br>");
    }

    $data = array();
    $data["devname"]=$_POST["devname"];
    $data["sticky"]=$_POST["sticky"];
    $data["time"]=date("Y-m-d H:i:s");

    switch($store_medthod){
        case "json":{
            if(file_exists("sticky.json")){
                $sticky_data = json_decode(file_get_contents("sticky.json"));
                $sticky_data[]=$data;
                $sticky_data = array_values($sticky_data);
                file_put_contents("sticky.json",json_encode($sticky_data));
            }else{
                $sticky_data[]=$data;
                $sticky_data = array_values($sticky_data);
                file_put_contents("sticky.json",json_encode($sticky_data));
            }
            break;
        }
        case "database":{
            break;
        }
    }
   

    //without debug  the page will return inidex.php
    global $debug;
    //print($debug);
    if($debug==0){
        print("<script>window.location.href=\"index.php\"</script>");
    }
    
}
function msg_section(){

}
function file_section(){
    //data store method
    $store_medthod="json";
    if(!isset($_POST["devname"])){
        die("stop with no sender's devname<br>");
    }
    if(!isset($_POST["file_tag"])){
        die("stop with no file_tag date<br>");
    }

    //rename && move file to upload file floder
    $upload_dir = "./upload_file/";
    $file_name = $_FILES["file"]["name"];
    

    if(move_uploaded_file(
        $_FILES["file"]["tmp_name"],
        $upload_dir.$_FILES["file"]["name"]
        )){
            print("uploaded");
        }else{
            die("can't upload file of".$_FILES["file"]["name"]);
        }


     //without debug  the page will return inidex.php
     global $debug;
     if($debug==1){
         print("name: ".$_FILES["file"]["name"]."<br>");
         print("type: ".$_FILES["file"]["type"]."<br>");
         print("tmp_name: ".$_FILES["file"]["tmp_name"]."<br>");
         print("error: ".$_FILES["file"]["error"]."<br>");
         print("size: ".$_FILES["file"]["size"]."<br>");
     }
     //print($debug);
     if($debug==0){
         print("<script>window.location.href=\"index.php\"</script>");
     }
}
function test_section(){
    print("test section<br>");
    print_r($_POST);
}

