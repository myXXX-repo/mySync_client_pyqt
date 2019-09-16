<?php

//require_once 'lib/php/sqlInit.php';

//获取表名
//$tableName=$_REQUEST['tableName'];

//$database=new DataBase($tableName);

//$operates = $_REQUEST['operates'];  

//echo(json_encode($_REQUEST));
$data = array();
$data['time']=date('Y-m-d H:i:s');
$data['requestIp']=$_SERVER['REMOTE_ADDR'];
$data['debug']='off';
$data['a']=$_REQUEST['operates'];
$data['tableName']=$_REQUEST['tableName'];
echo(json_encode($data));

class RequestHolder{
    private $tableName;
    private $operates;
}