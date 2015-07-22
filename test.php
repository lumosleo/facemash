<?php

$con = mysql_connect("localhost","root","","randomone");
mysql_select_db("randomone");


if ($handle = opendir('./images/emma')) {

    /* This is the correct way to loop over the directory. */
    while (false !== ($file = readdir($handle))) {
        if($file!='.' && $file!='..') {
            $images[] = "('".$file."')";
        }
    }

    closedir($handle);
}

$query = "INSERT INTO randomone (imgname) VALUES ".implode(',', $images)." ";
if (!mysql_query($query)) {
    print mysql_error();
}
else {
    print "finished installing your images!";
}

mysql_close($con);

?>















