<?php



class LittleTools{
    public function echoJson($data){
        echo json_encode($data);
    }
    public function isItemInArray($array,$item){
        for($i=0;$i<cunt($array);$i++){
            if($array[$i]==$item){
                return true;
            }
            return false;
        }
    }
}