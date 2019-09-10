<?php
require_once 'Medoo.php';
use Medoo\Medoo;


class DataBase{
    private $dataBase;
    private $tableName;
    private function newDataBase(){
        return new Medoo([
            'database_type' => 'mysql',
            'database_name' => 'mysync',
            'server' => '127.0.0.1',
            'username' => 'root',
            'password' => 'wolf',
            'charset' => 'utf8'
        ]);
    }
    public function __construct($tableName){
        $this->tableName=$tableName;
        $this->dataBase=$this->newDataBase();
    }
    public function selectAllData(){
        return $this->dataBase->select($this->tableName,"*");
    }
    public function insertDataItem($series,$data){
        $array=array();
        if(is_array($series)&&is_array($data)){
            for($i=0;$i<count($series);$i++){
                $array[$series[$i]]=$data[$i];
            }
        }else{
            if((!is_array($series))&&(!is_array($data))){
                $array[$series]=$data;
            }else{
                return "error";
            }
        }
        $this->dataBase->insert($this->tableName,$array);
        return "ok";
    }
}

/*
$dataBase=new DataBase('sticky');
$data=$dataBase->selectAllData();
print_r($data);
print($dataBase->insertDataItem('sticky','sticky'));
print_r($dataBase->selectAllData());
print_r($dataBase->insertDataItem(['sticky'],['ojbk']));
print_r($dataBase->selectAllData());
*/