<?php
    session_start(); // Starting Session

    try
    {
        // Database type, server, database, credentials: (user, password)
	    $db = new PDO("mysql:host=localhost;dbname=Task", "root", "r00t");
	    //Troubleshoot malformed SQL statements
	    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e)
    {
		echo 'ERROR: ' . $e->getMessage();
	}

    if (isset($_POST['submit'])) 
    {

        $error = ''; // Variable To Store Error Message

        // Define $username and $password
        $username = $_POST['username'];
        $password = $_POST['password'];

		if($username == '')
			$error .= 'You must enter your Username<br>';
		
		if($password == '')
			$error .= 'You must enter your Password<br>';

        if($error == ''){
            $records = $db->prepare('SELECT username,password FROM user WHERE username = :username');
		    $records->bindParam(':username', $username);
		    $records->execute();
		    $results = $records->fetch(PDO::FETCH_ASSOC);

		    if(count($results) > 0)
            {
			    $_SESSION['username'] = $results['username'];
			    header('location:login.php');
			    exit;
		    }
            else
            {
			    $error = 'Username and Password are not found<br/>';
		    }
        } 
    }
?>

<html>
<head><title>Login Page</title></head>
  <body>
	<div align="center">
		<div style="width:300px; border: solid 1px #006D9C; " align="left">
			<?php
				if(isset($error)){
					echo '<div style="color:#FF0000;text-align:center;font-size:12px;">'.$error.'</div>';
				}
			?>
			<div style="background-color:#006D9C; color:#FFFFFF; padding:3px;"><b>Login</b></div>
			<div style="margin:30px">
				<form action="" method="post">
					<label>Username  :</label><input type="text" name="username" class="box"/><br /><br />
					<label>Password  :</label><input type="password" name="password" class="box" /><br/><br />
					<input type="submit" name='submit' value="Submit" class='submit'/><br />
				</form>
			</div>
		</div>
	</div>
  </body>
</html>

<?php
    echo "<br/>";
    echo "Or Sign Up Here: ";
    echo "<a href='user.php'>Register</a>";
?>
