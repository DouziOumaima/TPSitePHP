<?php 
session_start();
include_once "../controllers/UserController.php";
 
if(isset($_FILES['post'])){


    $userController = UserController::createUserFromId($_SESSION['id']);
 
    // tester si l'image est bonne: png ou jpeg ou jpg
    if($userController -> isImageValid($_FILES['post'])){
    
    //enregsitrer l'image dans le serveur avec le nom (id.png)
    //Mettre a jour l'avatar de user dans la base de données.
      $_SESSION['post'] = $userController -> saveImage($_FILES['post']);
      header('Location: /profil.php');
      die();
    }else{
      header('Location: /profil.php');
      die();
      }
    }


?>