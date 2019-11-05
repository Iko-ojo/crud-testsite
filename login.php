<?php 
session_start();

if($_POST){
$_SESSION['name'] = $_POST['name'];
$_SESSION['password']= md5($_POST['password']);


if($_SESSION['name'] && $_SESSION['password']){

    mysql_connect("localhost","root","") or die("Failed to Connect");

    mysql_select_db("testsite");

    $query = mysql_query("SELECT * FROM users where name='".$_SESSION['name']."'");
    $numrows = mysql_num_rows($query);

    if($numrows != 0){
        while($row = mysql_fetch_assoc($query)){
            $dbname = $row['name'];
            $dbpassword = $row['password'];
        }

        if($_SESSION['name'] == $dbname ){
            if($_SESSION['password'] == $dbpassword){
                // Setting Cookie
                if(($_POST['remember'] )== 'on'){
                    // Setting a expiration time for cookie
                    $expire = time() + 86400;
                    setcookie('testsite', $_POST['name'], $expire);
                }

                header("location: enter.php");

            }else{
                echo("Incorrect Password");
            }
        }else{
            echo("Incorrect Name");
        }
    }else{
        echo ("This name is not registered!");
    }

}else{
    echo("Please your full login details");
}
}else{
    echo("Access Denied");
    exit;
}

?>