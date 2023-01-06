<?php 
session_start();
include_once "../controllers/UserController.php";
 
if(isset($_FILES['avatar'])){


    $userController = UserController::createUserFromId($_SESSION['id']);
 
    // tester si l'image est bonne: png ou jpeg ou jpg
    if($userController -> isImageValid($_FILES['avatar'])){
    
    //enregsitrer l'image dans le serveur avec le nom (id.png)
    //Mettre a jour l'avatar de user dans la base de données.
      $_SESSION['avatar'] = $userController -> saveImage($_FILES['avatar']);
      header('Location: /profil.php');
      die();
    }else{
      header('Location: /profil.php');
      die();
      }
    }


?>