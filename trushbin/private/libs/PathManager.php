<?php
/**
 * 
 * FILENAME:  pathList.php
 * 
 * LOCATION:  /private/pathList.php
 * 
 * AFFECT:    get the global path
 * 
 * AUTHOR:    Wolf Hugo
 * 
 * 
 */
function println($con){
    print($con."<br>");
}


class PathManager{
    private $root;

    public function setRoot($root){
        $this->root=$root;
    }

    /* /private */
    public function getPrivateFolderPath(){
        return $this->root.'/private';
    }

    /* /private/config */
    public function getConfigFolderPath(){
        return $this->getPrivateFolderPath().'/config';
    }
    public function getConfigFilePath(){
        return $this->getConfigFolderPath().'/config.json';
    }
    public function getDebugFilePath(){
        return $this->getConfigFolderPath().'/debug.json';
    }
    public function getInitFilePath(){
        return $this->getConfigFolderPath().'/init.json';
    }

    /* /private/libs */
    public function getLibsFolderPath(){
        return $this->getPrivateFolderPath().'/libs';
    }
    public function getLibPath($libName){
        return $this->getLibsFolderPath().'/'.$libName.'.php';
    }

    /* /public */
    public function getPublicFolderPath(){
        return $this->root.'/public';
    }

    /* /public/.list.json */
    public function getPluginsListPath(){
        return $this->getPublicFolderPath().'/.list.json';
    }

    /* /public/base */
    public function getBaseFolderPath(){
        return $this->getPublicFolderPath().'/base';
    }
    public function getPluginBaseFolderPath($pluginID){
        return $this->getBaseFolderPath().'/'.$pluginID;
    }
    public function getPluginBaseFilePath($pluginID){
        return $this->getPluginBaseFolderPath($pluginID).'/base.php';
    }

    /* /public/data */
    public function getDataFolderPath(){
        return $this->getPublicFolderPath().'/data';
    }
    public function getPluginDataFolderPath($pluginID){
        return $this->getDataFolderPath().'/'.$pluginID;
    }
    public function getPluginDataListPath($pluginID){
        return $this->getPluginDataFolderPath($pluginID).'/.list.json';
    }

    /* /src */
    public function getSrcFolderPath(){
        return $this->root.'/src';
    }
    /*
    public function getCssFolderPath(){
        return $this->getSrcFolderPath().'/css';
    }
    public function getJsFolderPath(){
        return $this->getSrcFolderPath().'/js';
    }
    public function getImgFolderPath(){
        return $this->getSrcFolderPath().'/img';
    }*/
    public function getSrcFilePath($type,$fileName){
        return getSrcFolderPath().'/'.$type.'/'.$fileName;
    }


    /*
    public function testPathManager($root){
        $this->setRoot($root);
        println($this->getPrivateFolderPath());
        println($this->getConfigFolderPath());
        println($this->getConfigFilePath());
        println($this->getDebugFilePath());
        println($this->getInitFilePath());
        println($this->getLibsFolderPath());
        println($this->getLibPath('PathManager'));
        println($this->getPublicFolderPath());
        println($this->getPluginsListPath());
        println($this->getBaseFolderPath());
        println($this->getPluginBaseFolderPath('sticky'));
        println($this->getDataFolderPath());
        println($this->getPluginDataFolderPath('file_host'));
        println($this->getSrcFolderPath());
        println($this->getJsFolderPath());
        println($this->getImgFolderPath());
    }
    */
}

/*
$pm = new PathManager;
$pm->testPathManager('.');
*/