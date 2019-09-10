<?php

require_once "./sqlInit.php";


$database=new DataBase('sticky');
//print_r($data);
if(isset($_POST['operate'])){
    switch($_POST['operate']){
        case 'getalldata':{
            echo json_encode($database->selectAllData());
            break;
        }
        case 'add':{
            if(isset($_POST['sticky'])&&$_POST['sticky']!=null){
                $database->insertDataItem('sticky',$_POST['sticky']);
            }
            header('Location: index.html');
            break;
        }
    }
    
}

//($_SERVER);