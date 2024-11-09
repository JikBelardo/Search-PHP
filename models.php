<?php 
    require_once 'dbConfig.php';

    function getAllUsers($pdo) {
        $sql = "SELECT * FROM search_engine 
                ORDER BY first_name ASC";
        $stmt = $pdo->prepare($sql);
        $executeQuery = $stmt->execute();
        if ($executeQuery) {
            return $stmt->fetchAll();
        }
    }
    
    function getUserByID($pdo, $id) {
        $sql = "SELECT * from search_engine WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $executeQuery = $stmt->execute([$id]);
    
        if ($executeQuery) {
            return $stmt->fetch();
        }
    }
    
    function searchForAUser($pdo, $searchQuery) {
	
        $sql = "SELECT * FROM search_engine WHERE 
                CONCAT(first_name,last_name,age,civil_status, camera_type, years_of_experience, specialized_event, date_added) 
                LIKE ?";
    
        $stmt = $pdo->prepare($sql);
        $executeQuery = $stmt->execute(["%".$searchQuery."%"]);
        if ($executeQuery) {
            return $stmt->fetchAll();
        }
    }

    function insertNewUser($pdo, $first_name, $last_name, $age, 
	$civil_status, $camera_type, $years_of_experience, $specialized_event) {

	$sql = "INSERT INTO search_engine 
			(
				first_name,
				last_name,
				age,
				civil_status,
				camera_type,
				years_of_experience,
                specialized_event
			)
			VALUES (?,?,?,?,?,?,?)
			";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([
		$first_name, $last_name, $age, 
		$civil_status, $camera_type, $years_of_experience, 
		$specialized_event
	]);

	if ($executeQuery) {
		return true;
	}

}

function editUser($pdo, $first_name, $last_name, $age, $civil_status, 
	$camera_type, $years_of_experience, $specialized_event, $id) {

	$sql = "UPDATE search_engine
				SET first_name = ?,
					last_name = ?,
					age = ?,
					civil_status = ?,
					camera_type = ?,
					years_of_experience = ?,
					specialized_event = ?
				WHERE id = ? 
			";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$first_name, $last_name, $age, $civil_status, 
		$camera_type, $years_of_experience, $specialized_event, $id]);

	if ($executeQuery) {
		return true;
	}

}


function deleteUser($pdo, $id) {
	$sql = "DELETE FROM search_engine
			WHERE id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$id]);

	if ($executeQuery) {
		return true;
	}
}

function checkIfUserExists($pdo, $username) {
	$response = array();
	$sql = "SELECT * FROM search_engine WHERE username = ?";
	$stmt = $pdo->prepare($sql);

	if ($stmt->execute([$username])) {

		$userInfoArray = $stmt->fetch();

		if ($stmt->rowCount() > 0) {
			$response = array(
				"result"=> true,
				"status" => "200",
				"userInfoArray" => $userInfoArray
			);
		}

		else {
			$response = array(
				"status" => "400",
				"message"=> "User doesn't exist from the database"
			);
		}
	}

	return $response;

}



?>