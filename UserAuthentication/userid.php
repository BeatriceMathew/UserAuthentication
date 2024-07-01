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
        if ($count == 1) {
            // Login successful
            echo "<h1>Login successful</h1>";
    
            // Fetch the current visit_count and update it
            $row = mysqli_fetch_assoc($result);
            $visit_count = $row['visit_count'] + 1;
    
            // Update the visit_count for the user
            $update_sql = "UPDATE visit SET visit_count=$visit_count WHERE userid='$userid'";
            if (mysqli_query($con, $update_sql)) {
                echo "<p>Visit count: $visit_count</p>";
            } else {
                echo "Error updating visit count: " . mysqli_error($con);
            }
        } else {
            // Login failed
            echo "<h1>Login failed: Invalid username or password</h1>";
        }
    }
    ?>
