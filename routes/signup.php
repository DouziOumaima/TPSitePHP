<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/UserController.php";

//var_dump($_POST);

if (isset($_POST['username'],  $_POST['email'], $_POST['password'] , $_POST['RePassword'])) {

  $user = new UserController($_POST['username'], $_POST['email'], $_POST['password'], $_POST ['RePassword']);

  //var_dump($user->exist());

  if ($user->isDataValid()) {

    if ($user->exist()) {
      
      header('Location: /login?inscription=error&emailError=EmailExist');
      die();
    }

    $user -> signupUser();
    header('Location: /profil.php');

  } else {
    $returnData = $user->getErrors();
    header('Location: /login.php?inscription=error&' .$returnData);
    var_dump($returnData);

  }
  /* ($returnData) NORMALEMENT ELLE va nous retourner 4 cas
        //usernameError =InputInvalid
       // emailError=InputInvalid
       // passwordError =InputInvalid
       // ou  usernameError=InputInvalid&emailError=InputInvalid&passwordError=InputInvalid */
} else {
  header('Location: /login.php');

 
}


