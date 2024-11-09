<?php 
    require_once 'dbConfig.php';
    require_once 'models.php';

    if (isset($_POST['insertUserBtn'])) {
        $insertUser = insertNewUser($pdo,$_POST['first_name'], $_POST['last_name'], $_POST['age'], $_POST['civil_status'], 
        $_POST['camera_type'], $_POST['years_of_experience'], $_POST['specialized_event']);
    
        if ($insertUser) {
            $_SESSION['message'] = "Successfully inserted!";
            header("Location: ../index.php");
        }
    }
    
    
    if (isset($_POST['editUserBtn'])) {
        $editUser = editUser($pdo,$_POST['first_name'], $_POST['last_name'], $_POST['age'], $_POST['civil_status'], $_POST['camera_type'], 
        $_POST['years_of_experience'], $_POST['specialized_event'], $_GET['id']);
    
        if ($editUser) {
            $_SESSION['message'] = "Successfully edited!";
            header("Location: ../index.php");
        }
    }
    
    if (isset($_POST['deleteUserBtn'])) {
        $deleteUser = deleteUser($pdo,$_GET['id']);
    
        if ($deleteUser) {
            $_SESSION['message'] = "Successfully deleted!";
            header("Location: ../index.php");
        }
    }

    if (isset($_GET['searchBtn'])) {
        $searchForAUser = searchForAUser($pdo, $_GET['searchInput']);
        foreach ($searchForAUser as $row) {
            echo "<tr> 
                    <td>{$row['id']}</td>
                    <td>{$row['first_name']}</td>
                    <td>{$row['last_name']}</td>
                    <td>{$row['age']}</td>
                    <td>{$row['civil_status']}</td>
                    <td>{$row['camera_type']}</td>
                    <td>{$row['years_of_experience']}</td>
                    <td>{$row['specialized_event']}</td>
                  </tr>";
        }
    }
?>