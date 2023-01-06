<?php 

include_once  $_SERVER['DOCUMENT_ROOT'] . "/models/DB.php";

 class UserModel extends DB{

    private $username;
    private $email;
    private $password;
    private $RePassword; 

    function __construct($username , $email , $password ,$RePassword){
        parent::__construct();

        $this -> username= $username ;
        $this -> email=  $email;
        $this ->  password = $password;
        $this -> RePassword = $RePassword ;
    }
    function fetch() : array {
        $stmt = $this -> getConnect() -> prepare('SELECT * FROM users WHERE email=?');

        
    $stmt -> bindParam(1, $this ->email);

    $res = $stmt -> execute();
    
    $userFromDB = $stmt -> fetch(PDO::FETCH_ASSOC);// ramener un seul utilisateur sous forme de tab assoc

    if(is_bool($userFromDB)){
      return [];
    }
    
    return $userFromDB;
  }

  function addToDB(){
    $stmt = $this -> getConnect() -> prepare('INSERT INTO users ( username, email, password) VALUES (? ,? ,?)');

    $stmt -> bindParam(1, $this -> username);
    $stmt -> bindParam(2, $this -> email);
    $stmt -> bindParam(3, $this -> password);

    $stmt -> execute();
}
static function fetchByID($id){
  $connect = DB::getConnection();

  $stmt = $connect -> getConnect() -> prepare('SELECT * FROM users WHERE id=?');

  $stmt -> bindParam(1, $id);
  $res = $stmt ->execute();
  $userFromDB = $stmt -> fetch(PDO::FETCH_ASSOC);
  return $userFromDB;
}
function saveImageToDB($image){
  $stmt = $this -> getConnect() -> prepare("UPDATE users SET avatar=? WHERE email=?");
  $stmt ->bindParam(1, $image);
  $stmt ->bindParam(2, $this -> email);
  $stmt ->execute();
}
function saveCoverToDB($image){
  $stmt = $this -> getConnect() -> prepare("UPDATE users SET cover=? WHERE email=?");
  $stmt ->bindParam(1, $image);
  $stmt ->bindParam(2, $this -> email);
  $stmt ->execute();
}
//creer la function fetch  et utiliser la et stmt , connexion (getConnect)

function savePostToDB($image){
  $stmt = $this -> getConnect() -> prepare("UPDATE posts SET post=? WHERE email=?");
  $stmt ->bindParam(1, $image);
  $stmt ->bindParam(2, $this -> email);
  $stmt ->execute();
}


}