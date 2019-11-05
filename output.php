<?php 
mysql_connect("localhost","root","") or die("Failed to Connect");

mysql_select_db("testsite");

$result = mysql_query("
    SELECT * FROM users
");

while($row = mysql_fetch_array($result)){
    echo ($row['name']. " ".$row['email']." ".$row['password']);

    echo ("<br>");
};
mysql_close();
?>
<h3><center>
<?php include ("links.php"); ?>
</center></h3>