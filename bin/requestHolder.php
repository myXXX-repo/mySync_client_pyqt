<?php

require_once 'lib/php/sqlInit.php';

//获取表名
$tableName=$_REQUEST['tableName'];

$database=new DataBase($tableName);

