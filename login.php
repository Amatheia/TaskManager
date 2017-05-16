<?php
	session_start();

    $username = $_SESSION['username'];

	echo "Welcome '" . $username . "'";
    echo "<br/>";
    echo "<br/>";
    echo "Read all tasks: <a href='readAllService.php'>See All Tasks</a>";
    echo "<br/>";
    echo "Read task by ID: <a href='readIdService.php'>See Task By ID</a>";
    echo "<br/>";
    echo "Create task: <a href='createTaskService.php'>Create Task</a>";
    echo "<br/>";
    echo "Update task: <a href='updateTaskService.php'>Update Task</a>";
    echo "<br/>";
    echo "Delete task: <a href='deleteTaskService.php'>Delete Task</a>";
    echo "<br/>";
    echo "<br/>";
    echo "Show tasks performed table: <a href='useroutput.php'>User Task Table</a>";
    echo "<br/>";
    echo "<br/>";
    echo "Or Logout: <a href='logout.php'>Logout</a>";

?>

