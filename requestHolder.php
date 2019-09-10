<?php

require_once './sqlInit.php';

//获取表名
$tableName=$_POST['tableName'];

$database=new DataBase($tableName);

