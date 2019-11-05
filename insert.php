<?php 
 
$mypic = $_FILES['upload']['name'];
$temp = $_FILES['upload']['tmp_name'];
$type = $_FILES['upload']['type'];


$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];

if($name && $email && $password && $cpassword){
    if(preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)){
    if(strlen($password) > 3 ){
    if($password == $cpassword){
             mysql_connect("localhost","root","") or die("Failed to Connect");

    mysql_select_db("testsite");

    $username = mysql_query("SELECT name FROM users WHERE name='$name'");
    $count = mysql_num_rows($username);

    $useremail = mysql_query("SELECT email FROM users WHERE email='$email'");
    $countemail = mysql_num_rows($useremail);

        if($count > 0){

            echo("Name already exists, <br> Please enter another Name");


        }else if($countemail > 0){
            echo("Email already exists, <br> Please enter another Email");

        } else{

            if( !($type =="image/jpg") || !($type =="image/png") || !($type=="image/bmp") || !($type=="image/jpeg") ){
                
               // Var direcory holding profiles/ name of user/ images/ their image
                $directory = "./profiles/$name/images/";
               //0777 shmuld 
                mkdir($directory, 0777, true);

                
                move_uploaded_file($temp, "profiles/$name/images/$mypic");
                echo ("This will be your Profile Picture <p><img border='1' width='50' height='50' src='profiles/$name/images/$mypic'><p><br>");
                echo("<a href='home.php'> Login Now</a>");
                $passwordmd5 = md5($password) ;
                mysql_query("INSERT INTO users(name,email,password)
                VALUES('$name','$email','$passwordmd5')");

                echo("You have successfully Registereed");
             } else{
                 echo("File format not supported!<br>
                 Upload a png or JPG or bmp file");
             }
            }
    }else{
        echo("Sorry Your Passwords don't Match");
    }
    } else{
        echo("Your password is too short
        <br> You need a password between length 4 - 15 
        characters");
    }
}else{
    echo("Invalid Email Address");
}

}else{
    echo ("You have to complete the form");
}


include('links.php');
?>