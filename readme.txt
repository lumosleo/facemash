-------------------------recreatefacemashbylumosleo--------------------------
#make sure Your amp stack is running
#modify The following parameters in the test.php as indicated
#run the imagerank.sql file in the sql database console to create the desired database for this project

			
$con = mysql_connect("localhost","root","","randomone");
mysql_select_db("randomone");

 - localhost - with the server address where the amp stack is running/leave it as local host if your comp is the one running the server
 - root - replace with the username for your 
 - randomone - replace with the name of your datanase
 - "" - with the password for your database if at all

#change the location of the pictures folder in the test.php script 
to the folder where your images are stored

#the updatewinner.php script updates the loser and winner score suitably and outputs to html that is received via an ajax call from index.php


#once the images are loaded up in the database 
run the index.php aanndd Youre Running Facemash 

have fun !! contribute to open source !! :D
lumosleo@gmail.com
