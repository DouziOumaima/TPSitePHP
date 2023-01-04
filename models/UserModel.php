<?php 
include_once  $_SERVER['DOCUMENT_ROOT'] . "/models/DB.php";

 class UserModel extends DB{

    private $username;
    private $email;
    private $password;
     
    function __construct($username , $email , $password){
        parent::__construct();

        $this -> username= $username ;
        $this -> email=  $email;
        $this ->  password = $password;
    }
    
 }

?>