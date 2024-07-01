<html>
    <head>
        <link rel="stylesheet" href="userlogin.css">
    </head>
    <body>
        <form method="post" action="userlogin.php">
            <table>
                <tr>
                    <td colspan="2" id="td1"><h1>LOGIN</h1><td>
</tr>
<tr>
    <td>Email</td>
    <td><input type="text" name="email"></td>
<tr>
    <td>Password</td>
    <td><input type="password" name="password" maxlenth="6" minlength="6"></td>
</tr>
<tr>
    <td colspan="2" id="td1"><input type="submit" name="login" value="LOGIN"></td>
</tr>
</tr>
			<tr> <td colspan="2" id="td1"><a href="signup.php">Create a New Account</a></td></tr>
</body>
</html>
<?php      
$con=mysqli_connect("localhost","root","");
if(!$con)
{
die("no connection".mysqli_error());
}  
mysqli_select_db($con,"hotel");
if(isset($_POST['login']))
     {
    $email = $_POST['email'];  
    $password = $_POST['password']; 
        $sql="SELECT * FROM user where email = '$email' and password = '$password'";		
        $result = mysqli_query($con,$sql);
        if($result){
        $count = mysqli_num_rows($result);   
        if($count == 1)
        {  
            header("Location: signup.php");
            	exit();		
        }  
        else
             {  
            echo "<h1> Login failed. Invalid email or password.</h1>";  
             }
	 }	else{
     echo "Error: " . mysqli_error($con);
     }
    }
?>  
