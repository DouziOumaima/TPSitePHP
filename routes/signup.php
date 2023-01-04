<?php 

include_once $_SERVER['DOCUMENT_ROOT']. "/controllers/UserController.php";



if(isset( $_POST ['username'],  $_POST['email'], $_POST['password'] )){

    $user = new UserController( $_POST['username'],$_POST['email'], $_POST['password'], );
     //var_dump($user->exist());
    if($user -> isDataValid()){
     
        if($user -> exist()){
        header ('Location: /login?inscription=error&emailError=EmailExist');
      
        die();
        }
        //$user -> signupUser();
        //header('Location: /login.php');
  
      }else{
        $returnData = $user -> getErrors();
        header('Location: /login.php?inscription=error&' . $returnData);
      }
  
    }else{
      header('Location: /login.php');
    }


  
            
    

