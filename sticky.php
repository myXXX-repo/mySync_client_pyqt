<?php

require_once "./sqlInit.php";


$database=new DataBase('sticky');
//print_r($data);
if(isset($_REQUEST['operate'])){
    switch($_REQUEST['operate']){
        case 'getalldata':{
            echo json_encode($database->selectAllData());
            break;
        }
        case 'add':{
            if(isset($_REQUEST['sticky'])&&$_REQUEST['sticky']!=null){
                $database->insertDataItem('sticky',$_REQUEST['sticky']);
            }
            header('Location: index.html');
            break;
        }
        case 'del':{
            //print_r($_REQUEST);
            //print_r($database->selectAllData());
            if(isset($_REQUEST['id'])&&$_REQUEST['id']!=null){
                $database->delItemById($_REQUEST['id']);
            }
            //print("<br>ergeghrte<br>");
            //print_r($database->selectAllData());
            header('Location: index.html');
            break;
        }
    }
    
}

//($_SERVER);