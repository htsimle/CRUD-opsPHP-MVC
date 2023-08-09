<?php

class ModalOperations {

    public function adduserdata($name, $email, $password, $dtime) {
		$config = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . '/ex3/' . 'config.ini');
		// Create connection
		$conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
		// Check connection
		if ($conn -> connect_error) {
			return null;
		}

		
		// prepare and bind
		$stmt = $conn -> prepare("INSERT INTO `details`(`name`, `email`, `password`,`dtime`) VALUES (?,?,?,?)");
		
		$stmt -> bind_param("ssss", $name, $email, $password, $dtime);
		$stmt -> execute();

		$id = $conn -> insert_id;
		$stmt -> close();
		$conn -> close();
		return $id;
	}



	public function displayall() {

		$config = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . '/ex3/' . 'config.ini');
		// Create connection
		$conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);	
	
		// Check connection
		if ($conn -> connect_error) {
			return FALSE;
		}
		
		
		
		$sql = "SELECT name, dtime From `details`";
		$result = $conn -> query($sql);
		
		$conn -> close();
		return $result;
	}

	
	public function fetchdatabyid($id) {

		$config = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . '/ex3/' . 'config.ini');
		// Create connection
		$conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);	
	
		// Check connection
		if ($conn -> connect_error) {
			return FALSE;
		}
		
		
		
		$sql = "SELECT name, email, password From `details` where id = '$id'";
		$result = $conn -> query($sql);
		
		$conn -> close();
		return $result;
	}	
	
	public function updatedetails($upid, $name, $email, $password) {

		$config = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . '/ex3/webfinal/' . 'config.ini');
		// Create connection
		$conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);	
	
		// Check connection
		if ($conn -> connect_error) {
			return FALSE;
		}	
		
		$sql = "UPDATE `details` SET  `name`='$name', `email`='$email', `password`='$password' WHERE `id`='$upid'"; 
		
		$result = $conn -> query($sql);
		
		$conn -> close();
	}	

	public function deleteblogdata($id) {

		$config = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . '/ex3/' . 'config.ini');
		// Create connection
		$conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);	
	
		// Check connection
		if ($conn -> connect_error) {
			return FALSE;
		}
		
		
		
		$sql = "DELETE FROM `details` WHERE id = '$id'";
		$result = $conn -> query($sql);
		
		$conn -> close();
		return $result;
	}	


	public function usersignupdata($name, $email, $password) {
		$config = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . '/ex3/' . 'config.ini');
		// Create connection
		$conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
		// Check connection
		if ($conn -> connect_error) {
			return null;
		}

		
		// prepare and bind
		$stmt = $conn -> prepare("INSERT INTO `user`(`name`, `email`, `password`) VALUES (?,?,?)");
		
		$stmt -> bind_param("sss", $name, $email, $password);
		$stmt -> execute();

		$id = $conn -> insert_id;
		$stmt -> close();
		$conn -> close();
		return $id;
	}



    // public function check_user_exists($name, $password) {
    //     $config = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . '/ex3/' . 'config.ini');
    //     // Create connection
    //     $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);

    //     // Check connection
    //     if ($conn->connect_error) {
    //         return false;
    //     }

    //     // Prepare the SQL statement
    //     $stmt = $conn->prepare("SELECT userID, name, password FROM user WHERE name = ? AND password = ?");
    //     $stmt->bind_param("ss", $name, $password);
    //     $stmt->execute();
    //     $stmt->store_result();
    //     $result = $stmt->num_rows > 0;

    //     $stmt->close();
    //     $conn->close();
    //     return $result;
    // }

		public function get_user_data($name, $password) {
			$config = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . '/ex3/' . 'config.ini');
			// Create connection
			$conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
	
			// Check connection
			if ($conn->connect_error) {
				return false;
			}
	
			// Prepare the SQL statement
			$stmt = $conn->prepare("SELECT userID, name FROM user WHERE name = ? AND password = ?");
			$stmt->bind_param("ss", $name, $password);
			$stmt->execute();
			$stmt->bind_result($userId, $userName);
			
			if ($stmt->fetch()) {
				$userData = array(
					'userId' => $userId,
					'name' => $userName
				);
			} else {
				$userData = false;
			}
	
			$stmt->close();
			$conn->close();
			return $userData;
		}
	
	  
}
?>