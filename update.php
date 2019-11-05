<?php 
session_start();
if(!isset($_SESSION['name'])){
    echo"Access DEnied";
}
else{
    include("session.php");
    echo "Choose an ID to Edit<br>";
mysql_connect("localhost","root","") or die("Failed to Connect");

mysql_select_db("testsite");

$per_page = 5;

// Counts every ID in the Table- users
$pages_query = mysql_query("SELECT COUNT('id') FROM users");
// 0 Means what num do we want to give the first row
$pages = ceil(mysql_result($pages_query, 0) / $per_page);

// if statement
$page = (isset($_GET['page']))  ? (int)$_GET['page'] : 1;

$start = ($page -1) * $per_page;
$query = mysql_query("SELECT * FROM users LIMIT $start, $per_page");
 




echo ("<table width=\"90%\" align= center border=2>");
echo ("<tr><td width=\"40%\" align=center bgcolor=\"FFFF00\" >ID</td>
<td width=\"40%\" align=center bgcolor=\"FFFF00\" >Name</td>
<td width=\"40%\" align=center bgcolor=\"FFFF00\" >Email</td>
<td width=\"40%\" align=center bgcolor=\"FFFF00\" >Password</td></tr>
");

while($row=mysql_fetch_assoc($query)){
    $id = $row['id'];
    $name = $row['name'];
    $email = $row['email'];
    $password = $row['password'];

    echo ("
    <tr><td align=center><a href=\"edit.php?ids=$id&names=$name&emails=$email&passwords=$password\">$id</a></td>
    <td>$name</td><td><a href='emailto.php?emails=$email'>$email</a></td><td>$password</td></tr>
    ");
} echo("</table");

    
    $prev = $page -1;
    $next = $page + 1;

    echo "<center>";
    if($page != 1){
    echo ("<a href='update.php?page=$prev'>Prev</a>");
    };
    //if pages is >= 1, do the following
    if($pages >= 1){

        for($x=1;$x<=$pages;$x++){
            echo ($x==$page) ?'<b><a href="?page='.$x.'">'.$x.'</a></b>  ' :'<a href="?page='.$x.'">'.$x.'</a>  ' ;
        }
    }
    if($page !=$pages){
    echo ("<a href='update.php?page=$next'>Next</a>");
    }
    echo "</center>";
mysql_close();
}
?>