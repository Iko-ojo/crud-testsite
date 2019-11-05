<?php

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
$query = mysql_query("SELECT name FROM users LIMIT $start, $per_page");
 
// While loop that take that all values in the names field and make an associative array

while($query_row = mysql_fetch_assoc($query)){

    echo($query_row['name'].'<br>');
}

$prev = $page -1;
$next = $page + 1;

if($page != 1){
echo ("<a href='pagination.php?page=$prev'>Prev</a>");
};
//if pages is >= 1, do the following
if($pages >= 1){

    for($x=1;$x<=$pages;$x++){
        echo ($x==$page) ?'<b><a href="?page='.$x.'">'.$x.'</a></b>  ' :'<a href="?page='.$x.'">'.$x.'</a>  ' ;
    }
}
if($page !=$pages){
echo ("<a href='pagination.php?page=$next'>Next</a>");
}

?>