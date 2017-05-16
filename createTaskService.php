<?php    
    session_start();

    if(!isset($_SESSION['username'])){
       header("Location:index.php");
    }

        require_once('vendor/autoload.php');

        $username = $_SESSION['username'];
        
        $client = new GuzzleHttp\Client();
        
        $url = "http://localhost/projects/project4/Task.php";

        try
        {
            $response = $client->request("POST", $url,
                    [
                        'form_params' =>
                        [
                            'description' => 'make dinner'
                        ]
                    ]);
            
            $response_body = $response->getBody();
        }
        catch (RequestException $ex)
        {
            echo "HTTP Request failed\n";
            echo "<pre>";
            print_r($ex->getRequest());
            echo "</pre>";
            
            if ($ex->hasResponse())
            {
                echo $ex->getResponse();
            }
        }
        
        echo "Task Service HTTP POST Response with description='make dinner':<br/>";
        echo "<pre>";
        echo "$response_body";
        echo "</pre>";

	    $db = new PDO("mysql:host=localhost;dbname=Task", "root", "r00t");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE requests SET `create` = IFNULL(`create`, 0) + 1 WHERE `username` = '".$username."' ";

	    $query = $db->prepare($sql);
	    $query->execute();
?>
