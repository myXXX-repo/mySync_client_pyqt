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
        <div class="footer">
            <hr>
            designed by Wolf Hugo <?php print(date("H:i:s"));?>
        </div>
    </body>
</html>