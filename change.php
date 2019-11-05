<?php

$id = $_REQUEST['id'];
$newname = $_REQUEST['newname'];
$newemail = $_REQUEST['newemail'];
$newpassword = md5($_REQUEST['newpassword']);

mysql_connect("localhost","root","") or die("Failled to connect");

mysql_select_db("testsite");

mysql_query("UPDATE users SET name='$newname', email='$newemail',password='$newpassword'
WHERE id='$id'");

echo("You data has been Update Successfully");

mysql_close();
include('links.php');

?>