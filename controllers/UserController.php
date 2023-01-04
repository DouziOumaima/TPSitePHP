<?php 
include_once $_SERVER['DOCUMENT_ROOT'] . "/models/UserModel.php";

class UserController{

    private $id;
    private $username;
    private $email;
    private $password;
    private $avatar;
    private $cover;
    private $role;
    private $posts = [];

    private $userModel;

    private const MIN_PASSWORD_LENGTH = 6;

    function __construct(string $username,string $email, string $password);
    {
         $this -> username =$username;
         $this -> email =$email;
         $this -> password =$password;

          $this -> userModel = new UserModel ($username , $email, $password);
    }
}
?>