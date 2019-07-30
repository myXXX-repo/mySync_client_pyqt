<?php
/**
 * 
 * FILENAME:  base.php
 * 
 * LOCATION:  /public/base/sticky/base.php
 * 
 * AFFECT:    plugin: sticky, base file
 * 
 * AUTHOR:    Wolf Hugo
 * 
 * 
 */

if($debug){
    print("<br>welcome to the sticky file<br>");
    print_r($_POST);
    print("<br>");}

if(isset($_POST['pluginId'])&&$_POST['pluginId']!='sticky'){
    die('wrong pluginId: '.$_POST['pluginId']);
}
if(!isset($_POST['option'])){
    die('have no option');
}
switch($_POST['option']){
    case 'add':{
        $stickOptionNode = new stickyOptionNode;
        $stickOptionNode->setStickyFilePath($pathManager->getPluginDataFolderPath('sticky').'/sticky.json');
        $stickOptionNode->addStickyItemToFile($_POST['devname'],$_POST['sticky']);
        break;
    }
    case 'del':{
        delDataItem();
        break;
    }
    case 'wipe':{
        wipeAllData();
        break;
    }
    case 'get':{
        getDataItem();
        break;
    }
    case 'show':{
        showAllData();
        break;
    }
}

/*
if(!isset($_POST['page'])){
    require '../../../private/libs/PathManager.php';
    $pathManager = new PathManager;
}*/




function addDataItem(){
    global $debug;
    if($debug){print("welcome to addDataItem<br>");}
    //if($debug){print_r($_POST);}
    global $pathManager;
    //print($pathManager->getPluginDataFolderPath('sticky').'/sticky.json'."<br>");
    $devname = $_POST['devname'];
    $sticky = $_POST['sticky'];
    $date = date('Y-m-d H:i:s');
    $stickyItem = array();
    $stickyItem['devname']=$devname;
    $stickyItem['sticky']=$sticky;
    $stickyItem['date']=$date;
    if($debug){print_r($stickyItem);}
    if(!file_exists($pathManager->getPluginDataFolderPath('sticky').'/sticky.json')){
        file_put_contents($pathManager->getPluginDataFolderPath('sticky').'/sticky.json',json_decode($stickyItem));
    }else{
        $stickyList = json_decode(file_get_contents($pathManager->getPluginDataFolderPath('sticky').'/sticky.json'));
        $stickyList[]=$stickyItem;
        file_put_contents($pathManager->getPluginDataFolderPath('sticky').'/sticky.json',json_encode($stickyList));
    }
}

class stickyOptionNode{
    private $stickyFilePath;
    private $stickyList;

    public function setStickyFilePath($stickyFilePath){
        $this->stickyFilePath = $stickyFilePath;
    }
    protected function getStickyListFromFile(){
        $this->stickyList = json_decode(file_get_contents($this->stickyFilePath));
    }
    protected function putStickyListToFile(){
        file_put_contents($this->stickyFilePath,json_encode($this->stickyList));
    }
    public function addStickyItemToFile($devname,$sticky){
        $this->getStickyListFromFile();

        $date = date('Y-m-d H:i:s');
        $stickyItem = array();
        $stickyItem['devname']=$devname;
        $stickyItem['sticky']=$sticky;
        $stickyItem['date']=$date;

        $this->stickyList[] = $stickyItem;

        $this->putStickyListToFile();
    }
    public function delStickyItemFromFile($stickyItemId){
        $this->getStickyListFromFile();

        $newStickyList = array();
        for($i=0;$i<sizeof($this->stickyList);$i++){
            if($i==$stickyItemId){

            }else{
                $newStickyList = $this->stickyList[$i];
            }
        }

        $this->stickyList = $newStickyList;

        $this->putStickyListToFile();
    }
    public function wipeAllData(){
        $this->stickyList = "";
        putStickyListToFile();
    }
    public function getStickyItem($stickyId){
        $this->getStickyListFromFile();
        $done = 0;
        for($i=0;$i<sizeof($this->stickyList),$done==0;$i++){
            if($i==$stickyId){
                return $this->stickyList[$i];
            }
        }
    }
    public function getAllData(){
        $this->getStickyListFromFile();

        return $this->stickyList;
    }

}