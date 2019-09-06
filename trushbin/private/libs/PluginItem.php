<?php
/**
 * 
 * FILENAME:  PluginsManager.php
 * 
 * LOCATION:  /private/PluginsManager.php
 * 
 * AFFECT:    manage the plugins
 * 
 * AUTHOR:    Wolf Hugo
 * 
 * 
 */
// maybe useless
 class PluginItem{
    private $pluginID;
    private $pluginName;
    private $pluginIntro;
    //TODO add ico for web gui
    //private $icoPath;

    public function setPluginId($pluginID){
        $this->pluginID = $pluginID;
    }
    public function setPluginName($pluginName){
        $this->pluginName = $pluginName;
    }
    public function setPluginIntro($pluginIntro){
        $this->pluginIntro = $pluginIntro;
    }

    public function putPluginToList($pluginListPath){
        
    }

 }