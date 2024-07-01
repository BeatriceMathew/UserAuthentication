<html>
	<head>
	<link rel="stylesheet" href="signup.css">

		<script>
			function validateEmail()
			{
				var x=document.myform.email.value;
				var atposition=x.indexOf("@");
				var dotposition=x.lastIndexOf(".");
				if(atposition<1||dotposition<atposition+2||dotposition+2>=x.length)
				{
					alert("Enter a valid Email");
					return false;
				}
				{
				return true;
			}
				}
				function togglesubmit() {
            var checkbox = document.getElementById('check');
            var submitbutton = document.getElementsByName('submit')[0];
            submitbutton.disabled = !checkbox.checked;
        }
				</script>
</head>
			
	<body>
		<form name="myform" method="post" action="signup.php" onsubmit=" return validateEmail();" >
			<table>
				<tr>
					<td id="td1" colspan="2"> <h1>SIGN UP</h1></td>
			</tr>
				<tr>
					<td>Name</td>
					<td><input type="text"  name="name" required></td>
				</tr>
				<tr>
					<td>Address</td>
					<td><input type="textarea" name="address" required></td>
				</tr>
				<tr>
					<td>Phone Number</td>
					<td><input type="text" name="mobile" required></td>
				</tr>
				<tr>
					<td>Email Id</td>
					<td><input type="text" name="email" required ></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="password" required maxlength="6" minlength="6"></td>
				</tr>
				<tr>
	<td colspan="2"><input type="checkbox" id="check" onclick="togglesubmit();">Accept terms and conditions</td>
			</tr>
				<tr>
					<td colspan="2" style="text-align:center"><input type="submit" value="SUBMIT" name="submit" disabled ><input type="reset" value="RESET"><input type="button" value="CANCEL" onclick="window.location.href='index.php';"></td>
 </tr>
			<tr> <td colspan="2" id="td1"><a href="userlogin.php">Existing User</a></td></tr>
</table>
</form>
</body>
</html>
<?php
$con=mysqli_connect("localhost","root","");
if(!$con)
{
	die('could not connect:'.mysqli_error());
}
$sql="CREATE DATABASE IF NOT EXISTS hotel";
mysqli_query($con,$sql);
mysqli_select_db($con,"hotel");
$str2="CREATE TABLE IF NOT EXISTS user(name varchar(20)NOT NULL,address varchar(30),mobile INT(15)NOT NULL,
email varchar(20)NOT NULL,password varchar(10))";
mysqli_query($con,$str2);
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$address=$_POST['address'];
	$mobile=$_POST['mobile'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$sql="INSERT INTO user(name,address,mobile,email,password) values('$name','$address','$mobile','$email','$password')";
	if (mysqli_query($con, $sql)) {
        mysqli_close($con);
        // Redirect to login.php after successful signup
        header("Location: userlogin.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}
?>