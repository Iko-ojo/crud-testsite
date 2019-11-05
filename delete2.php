<?php 
mysql_connect("localhost","root","") or die("Failed to Connect");

mysql_select_db("testsite");

$result = mysql_query("DELETE FROM users WHERE id='".$_REQUEST['id']."'");

echo ("The User been Deleted Sucessfully!");


mysql_close();
include('links.php');
?>