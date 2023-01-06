<?php 
session_start();
include_once "../controllers/UserController.php";

if(isset($_FILES['cover'])){

    $userController = UserController::createUserFromId($_SESSION['id']);

if($userController -> isImageValid($_FILES['cover'])){
    $_SESSION['cover'] = $userController -> saveCover($_FILES['cover']);
  header('Location: /profil.php');
  die();
}else{
  header('Location: /profil.php');
  die();
  }
}

