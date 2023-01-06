
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/models/PostModel.php";

class PostController{
  private $id;
  private $titre;
  private $contenu;
  private $date;
  private $postImage;
  private $authorID;


  private $postModel;

  function __construct( $titre, $contenu, $postImage, $authorID,){
    $this -> titre = $titre;
    $this -> contenu = $contenu;
    $this -> authorID = $authorID;
    $this -> postImage = $postImage ;
    $this -> postModel = new  PostModel($titre, $contenu, $postImage, $authorID);
  }

  function addPost(){
    $postTab = $this -> postModel -> addPost();
    $this -> date = $postTab['date']; 
    $this -> id = $postTab['id'];
    
  }

  static function fetchAll($authorID){
    return PostModel::fetchAll($authorID);
  }
  static function validatePost($postID){
    PostModel::updateIsDone($postID);
  }

  

}