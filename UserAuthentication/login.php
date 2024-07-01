<html>
    <body>
        <form action="#" method="post">
            <p>
                <label>username:</label>
                <input type="text" name="user"/>
            </p>
            <p>
                <label>Password:</label>
                <input type="password" name="pass"/>
            </p>
            <p>
            <input type="submit" name="login" value="login"/>
            </p>
        </form>
    </body>
    </html>
<?php
    $con=mysqli_connect("localhost","root","");
    if(!$con)
    {
        die("no connection".mysqli_error());
    }
    mysqli_select_db($con,"login");
    if(isset($_POST['login']))
    {
        $userid=$_POST['user'];
        $password=$_POST['pass'];
        $sql="SELECT * FROM visit where userid='$userid' and password='$password'";
        $result=mysqli_query($con,$sql);
        $count=mysqli_num_rows($result);
        if($count==1)
        {
            echo "<h1>Login successfull </h1>";
        }
        else {
            echo "<h1> Login failed invalid username or password </h1>";
        }
        $row=mysqli_fetch_assoc($result);
        $visit_count=$row['visit_count']+1;
        sql="UPDATE login SET visit_count=$visit_count WHERE userid='$userid'";
        echo "<p> visit count:$visit_count</p>"
        }
    ?>