<?php 
session_start();

include_once $_SERVER['DOCUMENT_ROOT']. "/controllers/UserController.php";
 


if(!(isset($_POST['email'], $_POST['password']))){
       header ("Location: /login.php");
       die();
    }

    $user = new UserController( '', $_POST['email'], $_POST['password'],'');

     if(!($user -> isEmailValid()&& $user -> isPasswordValid())){
        header("Location: /login.php?connexion=error&" . $user ->getConnexionErrors());
        die();
     }
     //  func qui return Soit false si elle ne trouve pa l'utilisateur soit elle nous rend l'utilisateur (tab asso)

     // verifier Si l'utilisateur exist dans la base de données sinon on affichera msg d'erreur
     if(!$user -> exist()){
        header("Location: /login.php?connexion=error&emailError=EmailDoesntExist" );
        die();
      }

      if(!$user -> isPasswordCorrect()){
         header("Location: /login.php?connexion=error&passwordError=PasswordIncorrect" );
         die();

         var_dump('getConnexionErrors');
       }
  //var_dump($_SESSION);

//$_SESSION["id"] = $user -> getId();
//$_SESSION['username']=$user ->getUsername();
$_SESSION["email"] = $user ->getEmail();
$_SESSION["password"] = $user ->getPassword();
//*$_SESSION["avatar"] = $user -> getAvatar();
//$_SESSION["cover"] = $user -> getCover();
//$_SESSION["role"] = $user -> getRole();


header("Location: /profil.php");


//  récuperer les données a travers l'email pour les mettre dans la session 
// verifier si le mot de passe est correct et gerer les erreur

?>