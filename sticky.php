<?php
//require_once "littleTools.php";
require_once "./sqlInit.php";


//require_once 'Medoo.php';
use Medoo\Medoo;

function getDatabase(){
    return new Medoo([
        'database_type' => 'mysql',
        'database_name' => 'mysync',
        'server' => '127.0.0.1',
        'username' => 'root',
        'password' => 'wolf',
        'charset' => 'utf8'
    ]);
}

$database=new DataBase('sticky');
//print_r($data);
if(isset($_POST['operate'])){
    switch($_POST['operate']){
        case 'getalldata':{
            echo json_encode($database->selectAllData());
            break;
        }
        case 'add':{
            $database->insertDataItem('sticky',$_POST['sticky']);
            header('Location: index.html');
            break;
        }
    }
    
}

//print_r($_SERVER);