<?php

    require_once("ITaskManager.php");

    // CRUD - Create, Read, Update, Delete

    class TaskManager implements ITaskManager {

        const DB = "mysql:host=localhost;dbname=Task";
		const DB_USER = "root";
		const DB_PASSWORD = "r00t";

        //Given a description, create a new record in the database
		public function create($desc)
		{
            $retVal = NULL;

			// Database type, server, database, credentials: (user, password)
			$db = new PDO(self::DB, self::DB_USER, self::DB_PASSWORD);
			//Troubleshoot malformed SQL statements
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			// Insert a new record (use backtick for reserved words)
			$sql = "INSERT INTO Task(`description`) VALUES (:desc)";
						
			try
			{
				$query = $db->prepare($sql);
				$query->bindParam(":desc", $desc);
				$query->execute();
                $retVal = $db->lastInsertId();
			}
			catch (Exception $ex)
			{
				echo "{$ex->getMessage()}<br/>";
			}

            return $retVal;
		}

        public function read($id)
        {
            $retVal = NULL;

            $db = new PDO(self::DB, self::DB_USER, self::DB_PASSWORD);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //Read the id, description for record
            $sql = "SELECT id, description FROM Task WHERE id=:id";

            try
            {
                $query = $db->prepare($sql);
                $query->bindParam(":id", $id);
                $query->execute();

                $results = $query->fetchAll(PDO::FETCH_ASSOC);

                $retVal = json_encode($results, JSON_PRETTY_PRINT);
            }
            catch (Exception $ex)
            {
                echo "{$ex->getMessage()}<br/>\n";
            }

            return $retVal;
        }

		public function readAll()
		{
            $retVal = NULL;
			
			$db = new PDO(self::DB, self::DB_USER, self::DB_PASSWORD);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			// Read all records
			$sql = "SELECT * FROM Task";		
			
            try
            {
                $query = $db->prepare($sql);
                $query->execute();

                $results = $query->fetchAll(PDO::FETCH_ASSOC);

                $retVal = json_encode($results, JSON_PRETTY_PRINT);
            }
            catch (Exception $ex)
            {
                echo "{$ex->getMessage()}<br/>\n";
            }

            return $retVal;		
		}
		
		public function update($id, $newDesc)
		{
            $retVal = NULL;

			$db = new PDO(self::DB, self::DB_USER, self::DB_PASSWORD);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql = "UPDATE Task SET `description`=:desc WHERE `id`=:id";

            try
            {
                $query = $db->prepare($sql);
                $query->execute(array(":id"=>$id, ":desc"=>$newDesc));

                $retVal = $query->rowCount(); // Return # of rows affected
            }
            catch (Exception $ex)
            {
                echo "{$ex->getMessage()}<br/>\n";
            }

            return $retVal;
		}
		
		// Given an id, delete the record in the database
		public function delete($id)
		{
            $retVal = NULL;

			$db = new PDO(self::DB, self::DB_USER, self::DB_PASSWORD);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			// Delete a new record
			$sql = "DELETE FROM Task WHERE id=:id";

            try
            {
                $query = $db->prepare($sql);
                $query->execute(array(":id"=>$id));

                $retVal = $query->rowCount(); // Return # of rows affected
            }
            catch (Exception $ex)
            {
                echo "{$ex->getMessage()}<br/>\n";
            }

            return $retVal;
        }
			
    }

?>
