<?php 
include_once $_SERVER['DOCUMENT_ROOT'] . "/models/DB.php";

class PostModel extends DB{
  
    private $id;
    private $titre;
    private $contenu;
    private $date;
    private $postImage;
    private $authorID;

 

  function __construct($titre, $contenu, $postImage, $authorID){
    parent::__construct();
    $this -> titre = $titre;
    $this -> contenu = $contenu;
    $this -> authorID = $authorID;
    $this -> postImage = $postImage ;
    
  }
  function addPost(){
    var_dump($this -> getConnect());
    $stmt = $this -> getConnect() -> prepare("INSERT INTO posts (titre, postImage, contenu, authorID) VALUES (?, ?, ?, ?)");

    $stmt -> bindParam(1, $this -> titre);
    $stmt -> bindParam(2, $this -> postImage);
    $stmt -> bindParam(3, $this -> contenu);
    $stmt -> bindParam(4, $this -> authorID);

    $stmt -> execute();
    $this -> id =  $this -> getConnect() -> lastInsertId();

    return $this -> fetch();
  }
  function fetch(){
    $stmt = $this -> getConnect() -> prepare("SELECT * FROM posts WHERE id=?");
    $stmt -> bindParam(1, $this ->id);
    $stmt -> execute();
    return $stmt -> fetch(PDO::FETCH_ASSOC);
  }

  static function fetchAll($authorID){
    $connect = DB::getConnection();
    $stmt = $connect ->getConnect() -> prepare("SELECT * FROM posts WHERE authorID = ?");
    $stmt -> bindParam(1, $authorID);
    $stmt -> execute();
    return $stmt -> fetchAll(PDO::FETCH_ASSOC); 
  }

  

}

?>