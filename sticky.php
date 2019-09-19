<?php

require_once 'lib/php/sqlInit.php';


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
            header('Location: index1.html');
            break;
        }
        case 'del':{
            if(isset($_REQUEST['id'])&&$_REQUEST['id']!=null){
                $database->delItemById($_REQUEST['id']);
            }
            header('Location: index1.html');
            break;
        }
        case 'phpinfo':{
            phpinfo();
            break;
        }
    }

}

//($_SERVER);