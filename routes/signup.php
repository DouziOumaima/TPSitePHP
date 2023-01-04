<?php 

include_once $_SERVER['DOCUMENT_ROOT']. "/controllers/UserController.php";

var_dump($_POST);


if(isset( $_POST ['username'],  $_POST['email'], $_POST['password'] )){

    $user = new UserController( $_POST['username'],$_POST['email'], $_POST['password'], );
     
    if($user -> isDataValid()){
     
        if($user -> exist()){
         header ('Location : /login?inscription=error&emailError=EmailExist');
         die();
        }
        if($user -> exist()){
            header ('Location : /login?inscription=error&usernameError=UsernameExist');
            die();
           }

    }
}
