<?php
    session_start();

    require_once("TaskManager.php");

    $httpVerb = $_SERVER['REQUEST_METHOD']; // POST, GET, PUT, DELETE

    $taskManager = new TaskManager();

    switch ($httpVerb)
    {
        case "POST":
            // Create
            if (isset($_POST['description']))
            {
                $desc = $_POST['description'];
                echo $taskManager->create($desc);  
            }
            else
            {
                throw new Exception("Invalid HTTP POST request parameters.");
            }            
            break;

        case "GET":
            // Read
            header("Content-Type: application/json");
            if (isset($_GET['id'])) // Read (by Id)
            {
                echo $taskManager->read($_GET['id']);

            }
            else // Read (all)
            {
                echo $taskManager->readAll();                
            }     
            break;

        case "PUT":
            // Update
            parse_str(file_get_contents("php://input"), $putVars);  
            // reads entire file, returns a string (stream), parse_str puts into array
            if (isset($putVars['id']) && isset($putVars['description']))
            {
                $id = $putVars['id'];
                $newDesc = $putVars['description'];
                echo $taskManager->update($id, $newDesc);
            }
            else
            {
                throw new Exception("Invalid HTTP PUT request parameters.");
            } 
            break;

        case "DELETE":
            // Delete
            parse_str(file_get_contents("php://input"), $deleteVars);  
            // reads entire file, returns a string (stream), parse_str puts into array
            if (isset($deleteVars['id']))
            {
                $id = $deleteVars['id'];
                echo $taskManager->delete($id);
            }
            else
            {
                throw new Exception("Invalid HTTP DELETE request parameters.");
            } 
            break;

        default:
            throw new Exception("Unsupported HTTP request.");
            break;
    }
?>
