<!DOCTYPE html>
<html>
  <head>
    <title>PHP Project 4 New User</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>
  <body>
    <p>Enter a username and password to access the Task Manager app.</p>
	  <form action="" method="POST">
  		<div class="form-group">
    	  <label for="username">Username</label>
    	  <input type="username" class="form-control" id="username" name="username" placeholder="Username">
  		</div>
  		<div class="form-group">
    	  <label for="password">Password</label>
    	  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
  		</div>
  		<button type="submit" class="btn btn-default" name="submit">Submit</button>
	  </form>
<?php

    if(isset($_POST["submit"])){

        try
        {
	        // Database type, server, database, credentials: (user, password)
	        $db = new PDO("mysql:host=localhost;dbname=Task", "root", "r00t");
	        //Troubleshoot malformed SQL statements
	        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        
            $sql1 = "INSERT INTO user (`username`, `password`) VALUES ('".$_POST["username"]."','".$_POST["password"]."')";

            $sql2 = "INSERT INTO requests (`username`) VALUES ('".$_POST["username"]."')";  

			if ($db->query($sql1) && $db->query($sql2)) 
            {
                echo "<p>Thank you. You have been registered.</p>";
                echo "You are now ready to Log in: ";
                echo "<a href='index.php'>Log in</a>";
            } 
            else 
            {
                echo "<p>Sorry, there has been a problem.</p>";
            }
            
            $db = null;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
?>
  </body>
</html>
