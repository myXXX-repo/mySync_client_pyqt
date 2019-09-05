<?php
/**
 * 
 * FILENAME:  UnFunctions.php
 * 
 * LOCATION:  /private/UnFunctions.php
 * 
 * AFFECT:    some functions
 * 
 * AUTHOR:    Wolf Hugo
 * 
 * 
 */

//buggy haven't coded done

class UnFunctions{
    public function println($con){
        print($con.'<br>');
    }
    public function println_array($oneArray){
        //normal array can do this, one
        foreach($oneArray as $item){
            $this->println($item);
        }
    }
    
    public function ifInArray($value,$oneArray){
        foreach($oneArray as $item){
            if($item==$value){
                return true;
            }
        }
        return false;
    }
    public function ifIn2Array($value,$twoArray,$argcArray){
        foreach($twoArray as $item){
            foreach($argcArray as $argcItem){
                if($item[$argcItem]==$value){
                    return true;
                }
            }
        }
        return false;
    }
}

$unFunctions = new UnFunctions;
/*
$newArray = array();
$newArray["a"]="aaaa";
$newArray[]="bbbb";
$newArray[]="cccc";
$unFunctions->println_array($newArray);
*/