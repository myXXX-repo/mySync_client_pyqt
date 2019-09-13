<?php
require_once 'lib/php/Medoo.php';
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
    public function delItemById($id){
        $this->dataBase->delete($this->tableName,["id"=>$id]);
    }
}


// $dataBase=new DataBase('sticky');
// print_r($dataBase->selectAllData());
// $dataBase->delItemById('35');
// print_r($dataBase->selectAllData());