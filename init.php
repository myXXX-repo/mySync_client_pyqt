<?php
$inited=0;
if(file_exists("inited.ini")){
    global $inited;
    $inited=1;
}
//init database to store sticky
//init database to store msg
//init database to store file info



if($inited==0){
    file_put_contents("inited.int","1");
}