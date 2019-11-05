<?php 

mysql_connect("localhost","root","") or die("Failed to Connect");

mysql_select_db("testsite");

$result = mysql_query("SELECT * FROM users WHERE
id='".$_REQUEST['ids']."'");

echo ("<table width=\"90%\" align= center border=2>");
echo ("<tr><td width=\"40%\" align=center bgcolor=\"FFFF00\" >ID</td>
<td width=\"40%\" align=center bgcolor=\"FFFF00\" >Name</td>
<td width=\"40%\" align=center bgcolor=\"FFFF00\" >Email</td>
<td width=\"40%\" align=center bgcolor=\"FFFF00\" >Password</td></tr>
");

while($row=mysql_fetch_array($result)){
    $id = $row['id'];
    $name = $row['name'];
    $email = $row['email'];
    $password = $row['password'];

    echo ("
    <tr><td align=center>$id</td>
    <td>$name</td><td>$email</td><td>$password</td></tr>
    ");
} echo("</table");


?>
<html>
<form method="POST" action="delete2.php">
    <p> Are you sure you want to delete this User?
    <input type="submit" name="submit" value="OK">
    <input type="hidden" name="id" value="<?php echo $_REQUEST['ids'];?>" >
</form>
</html>
<?php include('links.php'); 

mysql_close();
?>