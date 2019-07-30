<?php
/**
 * 
 * FILENAME:  debugManager.php
 * 
 * LOCATION:  /private/debugManager.php
 * 
 * AFFECT:    to  manage debug tag
 * 
 * AUTHOR:    Wolf Hugo
 * 
 * 
 */

class DebugManager{
    private $debugTagPath;
    function setDebugTagPath($debugTagPath){
        $this->debugTagPath=$debugTagPath;
    }
    function initDebugStatue(){
        if(file_exists($this->debugTagPath)){
            return file_get_contents($this->debugTagPath);
        }else{
            file_put_contents($this->debugTagPath,'0');
            return '0';
        }
    }
    function setDebugOn(){
        file_put_contents($this->debugTagPath,'1');
        return '1';
    }
    function setDebugOff(){
        file_put_contents($this->debugTagPath,'0');
        return '0';
    }
    function switchDebugStatue(){
        $debugStatue = $this->initDebugStatue();
        if($debugStatue=='1'){
            return $this->setDebugOff();
        }
        if($debugStatue=='0'){
            return $this->setDebugOn();
        }
    }
}
