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


 //plugins list just s

class PluginsManager{
    private $pluginsListFilePath;
    private $pluginsList;

    public function setPluginsListFilePath($pluginsListFilePath){
        $this->pluginsListFilePath = $pluginsListFilePath;
    }

    public function getPluginsListFromFile(){
        $pluginsList_json = file_get_contents($this->pluginsList);
        $this->pluginsList = json_decode($pluginsList_json);
        //return $this->pluginsList;
    }

    public function putPluginsList(){
        $pluginsList_json = json_encode($this->pluginsList);
        file_put_contents($this->pluginsListFilePath,$pluginsList_json);
    }

    public function addPluginToList($pluginInfo){
        //$pluginInfo['id']
        //$pluginInfo['name']
        $this->getPluginsList();
        $this->pluginsList[]=$pluginInfo;
        $this->putPluginsList();
    }

    public function delPluginFromList($pluginId){
        $this->getPluginsList();
        $newpluginList = array();
        for($i=0;$i<sizeof($this->pluginList);$i++){
            if($this->pluginList[$i]['id']==$pluginId){
            }else{
                $newpluginList[]=$this->pluginList[$i];
            }
        }
        $this->pluginsList = $newpluginList;
        $this->putPluginsList();
    }
}