<?php 

if(isset($_COOKIE['testsite'])){
        //Redirect
        header('Location: enter.php');
}else{
echo "


<html>
<head>
</head> 

<body>
<h1><center> Welcome to CRUD control center </center></h1>
<hr><center>
<h3>Please Login . . . </h3>
<form method='post' action='login.php'>
        <table border='1' width='40%'>
       <tr><td> Name: </td>
        <td><input type='text' name='name' placeholder='Enter Your Name' maxlength='15' /></td></tr><br><br>
        <tr><td>  Password: </td>
        <td><input type='password' name='password'placeholder='Enter Your Password' maxlength='15'/></td></tr><br><br>
        <td> Remember Me:</td><td> <input type='checkbox' name='remember'/></td></tr><br><br>
        </table>
    
        <input type='submit' name='submit' value='Login' /><br>
        <a href='form.php'>Register</a>

        </form></center>
<h3><center>

</center></h3>
</body>

</html>";
} 
?>