<?php

 // F = MOnth, d = day, Y = Year, g(hour): i (minutes), a (am/pm) s = seconds = time
$date = date('F d, Y, g: i: s a');
echo "Today is :".$date."<br>";

  if(!isset($_SESSION['name']) && isset($_COOKIE['testsite'])){
    $_SESSION['name'] = $_COOKIE['testsite'];
  }

       $dir = "profiles/".$_SESSION['name']."/images/";
       $open = opendir($dir);
       while(($file = readdir($open)) != FALSE){
           if($file !="."&&$file !=". ."&&$file !="Thumbs.db"){
               echo "<img border='1' width='70' height-'70' src='$dir/$file'>";
           }
       } 
   echo(' &nbsp<b>'.$_SESSION['name']."'s </b>Session <br>");
    echo("<a href='logout.php'>Logout</a>");
    
    include('links.php');

?>