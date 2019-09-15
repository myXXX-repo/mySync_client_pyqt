<?php

require_once 'lib/php/sqlInit.php';

//获取表名
$tableName=$_REQUEST['tableName'];

$database=new DataBase($tableName);

$operates = $_REQUEST['operates'];

echo(json_encode($_REQUEST));

class RequestHolder{
    private $tableName;
    private $operates;
}