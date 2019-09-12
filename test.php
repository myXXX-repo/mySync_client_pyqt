<?php

require_once './sqlInit.php';

$database = new DataBase('sticky');
print_r($dataBase->selectAllData());
$dataBase->delItemById('31');
print_r($dataBase->selectAllData());