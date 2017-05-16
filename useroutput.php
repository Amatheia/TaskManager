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
    <div class="container">
            <div class="row">
                <h3>Users and Number of Requests</h3>
            </div>
            <div class="row">
                <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>User</th>
                          <th>create</th>
                          <th>read</th>
                          <th>readAll</th>
                          <th>update</th>
                          <th>delete</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                       $db = new PDO("mysql:host=localhost;dbname=Task", "root", "r00t");
                       $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                       
                       $sql = 'SELECT * FROM requests';

                       $query = $db->prepare($sql);
                       $query->execute();
  
                       foreach ($query as $row) {
                                echo '<tr>';
                                echo '<td>'. $row['username'] . '</td>';
                                echo '<td>'. $row['create'] . '</td>';
                                echo '<td>'. $row['readId'] . '</td>';
                                echo '<td>'. $row['readAll'] . '</td>';
                                echo '<td>'. $row['update'] . '</td>';
                                echo '<td>'. $row['delete'] . '</td>';
                                echo '</tr>';
                       }
                      ?>
                      </tbody>
                </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>
