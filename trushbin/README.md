# mySync
Run with php to sync data upown devices

I do use the Medoo.php to support the project to store data with database.

----
## function:
to realize the sticky,message,file sync in the devices group

we need a post request to tell the type of the data type
### sticky
For now this function use json file to store the data, in the future I will support it with database, like mysql.

$_POST["type"] = "sticky";

$_POST["devname"];

$_POST["sticky"];

and the program will add time to data save section

and the "devname","sticky","time" to store file or database

### message

haven't complated coded

$_POST["type"] = "msg";

### file

haven't coded

$_POST["type"] = "file";