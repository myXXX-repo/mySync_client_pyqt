<!DOCTYPE html>
<html>
    <head>
        <title>sync</title>
        <meta charset="utf8">
        <style>
        #content{
            width: 500px;
            height: 600px;
            overflow: hidden;
        }
        body{
            //background-color: gray;
        }
        </style>
    </head>
    <body>
        <div class="header">
            <h2>hello, to my sync</h2>
            <a href="switchdebug.php">switchdebug</a>
            <hr>
        </div>
        <!--sticky section-->
        <h4>sticky</h4>
        <div class="send_sticky">
            <form action="upload_data.php" method="post">
                <input type="hidden" name="type" value="sticky">
                <table>
                    <tr>
                        <td>devname</td>
                        <td><input type="text" name="devname" autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td>sticky</td>
                        <td><input type="text" name="sticky" autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit"></td>
                    </tr>
                </table>
            </form>
        </div>
        <br>
        <div class="show_sticky">
            <ul class="sticky_list"></ul>
            <script>
                var sticky_data=<?php echo file_get_contents("sticky.json");?>;
                var stickt_list=document.getElementsByClassName("sticky_list")[0];
                for(var i in sticky_data){
                    var a_del=document.createElement("a");
                    a_del.setAttribute("href","opt.php?option=del&id="+i);
                    a_del.appendChild(document.createTextNode("删除"));

                    var li = document.createElement("li");
                    li.appendChild(a_del);
                    li.appendChild(document.createTextNode(sticky_data[i]["devname"]+"| "+sticky_data[i]["sticky"]));
                    stickt_list.appendChild(li);
                }
            </script>
        </div>
        <br>
        <hr>
        <!--msg section-->
        <h4>message background haven't done</h4>
        <div class="send_msg">
            <form action="upload_data.php" method="post">
                <input type="hidden" name="type" value="msg">
                <table>
                    <tr>
                        <td>devname</td>
                        <td><input type="text" name="devname" autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td>address</td>
                        <td><input type="text" name="address" autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td>msg</td>
                        <td><input type="text" name="sticky" autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit"></td>
                    </tr>
                </table>
            </form>
        </div>
        <br>
        <div class="show_msg">
            <ul class="msg_list"></ul>
            <script>
                var msg_data=<?php echo file_get_contents("msg.json");?>;
                var msg_list=document.getElementsByClassName("msg_list")[0];
                for(var i in msg_data){
                    var a_del=document.createElement("a");
                    a_del.setAttribute("href","opt.php?option=del&id="+i);
                    a_del.appendChild(document.createTextNode("删除"));

                    var li = document.createElement("li");
                    li.appendChild(a_del);
                    li.appendChild(document.createTextNode(msg_data[i]["devname"]+"| "+msg_data[i]["msg"]));
                    stickt_list.appendChild(li);
                }
            </script>
        </div>
        <br>
        <hr>
        <!--file section-->
        <h4>file</h4>
        <h6>MAX_FILE_SIZE=32MB</h6>
        <div class="send_file">
            <form action="upload_data.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="type" value="file">
                <input type="hidden" name="MAX_FILE_SIZE" value="30000000">
                <table>
                    <tr>
                        <td>devname</td>
                        <td><input type="text" name="devname" autocomplete="off" value="111"></td>
                    </tr>
                    <tr>
                        <td>file_tag</td>
                        <td><input type="text" name="file_tag" autocomplete="off" value="11244325"></td>
                    </tr>
                    <tr>
                        <td>file</td>
                        <td><input type="file" name="file" autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit"></td>
                    </tr>
                </table>
            </form>
            <a href="./upload_file">文件列表</a>
        </div>



        <div class="footer">
            <hr>
            <?php ini_set('date.timezone','Asia/Shanghai');?>
            designed by Wolf Hugo <?php print(date("H:i:s"));?>
        </div>
    </body>
</html>
<?php
$dir = iconv("UTF-8", "UTF-8", "./upload_file");

if(!file_exists($dir)){
    mkdir($dir,0777,true);
}
?>