<?php
session_start();
include_once "../controllers/UserController.php";

if(isset($_POST['post'])){

  $userController = UserController::createUserFromId($_SESSION['id']);
  $userController -> addPost($_POST['titre'] ,$_POST['contenu'], $_POST['postImage'],$_POST['authorID']);

}

header('Location: /profil.php');
