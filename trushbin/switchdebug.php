<?php
if(file_exists("debug.ini")){
    unlink("debug.ini");
    print("debug is off");
}else{
    file_put_contents("debug.ini","1");
    print("debug is on");
}