<html>
    <head>
        <title> FORM </title>
    </head>
    <body>
    <h2> REGISTER FORM</h2>
        <form ENCTYPE="multipart/form-data" method="post" action="insert.php">
        <table border="0" width="60%">
       <tr><td width="10%"> Name: </td>
        <td><input type="text" name="name" placeholder="Enter Your Name" maxlength="15" /></td></tr><br><br>
        
        <tr><td width="10%"> Email: </td>
       <td> <input type="text" name="email" placeholder="Enter Your Email" maxlength="30"/></td></tr><br><br>
       
        <tr><td width="10%">  Password: </td>
        <td><input type="password" name="password" placeholder="Enter Your Password" maxlength="15"/></td></tr><br><br>
        <tr><td width="10%"> Confirm Password:</td>
        <td><input type="password" name="cpassword" placeholder="Confirm Your password" maxlength="15"/></td></tr><br><br>
       <input type="hidden" name="MAX_FILE_SIZE" value="10000" />
        </table>
        <p>
        Choose Your Picture:
        <input type="file" name="upload" /> <p>
        <input type="submit" name="submit" value="register" /><br>

        </form>

     
        
    </body>
</html>