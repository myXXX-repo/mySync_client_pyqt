<?php
/**
 * 
 * FILENAME:  index.php
 * 
 * LOCATION:  /index.php
 * 
 * AFFECT:    gate to all functions
 * 
 * AUTHOR:    Wolf Hugo
 * 
 * 
 */

// set the index.php dirname, and include the pathes
$html = 'show';
?>
<?php if($html=='show'):?>
<head>
        <meta charset="itf8">
        <title>mySync</title>
        <link rel="shortcut icon" href="./src/img/ico.png" />
    </head>
<?php endif?>

<?php
$root = __DIR__;
ini_set('date.timezone','Asia/Shanghai');

require $root."/private/libs/PathManager.php";
$pathManager = new PathManager;
$pathManager->setRoot($root);


require $pathManager->getLibPath("DebugManager");
$debugManager = new DebugManager;
$debugManager->setDebugTagPath($pathManager->getDebugFilePath());

$debug = $debugManager->initDebugStatue();
if(isset($_POST['debug'])){
    switch($_POST['debug']){
        case '0':{
            $debug = $debugManager->setDebugOff();
            break;
        }
        case '1':{
            $debug = $debugManager->setDebugOn();
            break;
        }
        case '2':{
            $debug = $debugManager->switchDebugStatue();
            break;
        }
    }
}


if($debug){print("debugStatue: ".$debug."<br>");}



?>


<?php

if(isset($_POST['pluginId'])&&$_POST['pluginId']!=null){
    require $pathManager->getLibPath("PluginsManager");

    $pluginsManager = new PluginsManager;
    $pluginsManager->setPluginsListFilePath($pathManager->getPluginsListPath());

    $pluginId = $_POST['pluginId'];

    if($debug){print_r($_POST);}
    require $pathManager->getPluginBaseFilePath($pluginId);
    /*
    if(1
        //in_array($pluginId,$pluginsManager->getPluginsList())
        ){
        require $pathManager->getPluginBaseFilePath($pluginId);
    }else{
        print("wrong pluginId: ".$pluginId.", whitch is not in the plugin list");
    }*/
}else{
    //die('wrong post request');
}
?>

<?php if($html == 'show'):?>
    <body>
        <h2>mySync</h2>
        <form action="" method="post">
            <input type="hidden" name="debug" value='2'>
            <input type="submit" value="switchDebugStatue">
        </form>
        <hr>
        <div id="stickyDIV">
            <form action="" method="post">
                <input type="hidden" name="pluginId" value="sticky">
                <input type="hidden" name="option" value="add">
                <table>
                    <tr>
                        <td>devname</td>
                        <td><input type="text" name="devname" autocomplete="off" value="WolfPC"></td>
                    </tr>
                    <tr>
                        <td>sticky</td>
                        <td><input type="text" name="sticky" autocomplete="off" value="anything"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit"></td>
                    </tr>
                </table>
            </form>
        </div>
<?php endif ?>



