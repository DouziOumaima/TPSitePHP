<?php 
session_start();
include_once $_SERVER['DOCUMENT_ROOT']. "/controllers/UserController.php";

$userController = UserController::createUserFromId($_SESSION['id']);

//var_dump($userController);
?>

<!DOCTYPE html>


<html lang="en">
<?php 
 $title = "Page de profil";
 include_once "./components/head.php";
?>

<body>
    <?php 
    include_once "./components/navbar.php";
    ?>
</body>
</html>