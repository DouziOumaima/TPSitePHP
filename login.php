<?php

session_start();

$inscriptionUsernameError = "";

$inscriptionEmailError = "";

$inscriptionPasswordError = "";

$inscriptionRePasswordError ="";

$connexionEmailError ="";

$connexionPasswordError ="";

if (isset($_GET['inscription'])) {
    if (isset($_GET['usernameError'])) {
        $inscriptionUsernameError = $_GET['usernameError'] === "InputInvalid" ? "Username incorrecte" : "Username exist";
    }
}
if (isset($_GET['inscription'])) {
    if (isset($_GET['emailError'])) {
        $inscriptionEmailError = $_GET['emailError'] === "InputInvalid" ? "Email incorrecte" : "Email existe deja!";
    }
    if (isset($_GET['passwordError'])) {
        $inscriptionPasswordError = $_GET['passwordError'] === "InputInvalid" ? "Mot de passe trop court" : "";
    }
    //var_dump($_GET['RePasswordError']);
    if(isset($_GET['RePasswordError'])){
        $inscriptionRePasswordError = $_GET['RePasswordError'] ===
        "InputInvalid" ? " Ressaisir le meme mot de passe" : "";
      }
    }
     //var_dump($_GET);
      //var_dump($inscriptionRePasswordError);
// on n'a pas les msg qui s'affichent
  
if (isset($_GET['connexion'])) {
    if (isset($_GET['emailError'])) {
        $connexionEmailError = $_GET['emailError'] === "InputInvalid" ? "Email incorrecte" : "";
    }
    if(isset ($_GET['emailError'])){
        $connexionEmailError = $_GET['emailError']==="EmailDoesntExist"? "Email n'existe pas": "";
    }
    
        if (isset($_GET['passwordError'])) {
            $connexionPasswordError = $_GET['passwordError'] === "InputInvalid" ? "Password incorrecte" : "";
        }
}
  
?>
<!DOCTYPE html>
<html lang="en">
<?php
$title = "Se connecter";
include_once "./components/head.php"
?>

<body>
    <?php
    include_once "./components/navbar.php"
    ?>
    <h1> Se connecter </h1>

    <main>
        <section>
            <h2> Inscription </h2>
            <form action="/routes/signup.php" method="post">
                <!-- dans l'input on a changer le type d'email par text pour eviter que le frontend nous arretent de mettre un faux email il va pas tester si c'est un email ou pas-->
                <input class='<?= $inscriptionEmailError !== "" ? "inputError" : "" ?>' 
                type="email"
                name="email"
                placeholder="jhon.doe@exemple.com" />
                 <p class ="error">
                    <?= $inscriptionEmailError ?>
                 </p>

                <input class='<?= $inscriptionUsernameError !=="" ? "inputError" : "" ?>' 
                type="text" 
                name="username" 
                placeholder="username"/>

                <p class="error">
                  <?= $inscriptionUsernameError ?>
                   </p>

              
                <input
                class='<?= $inscriptionPasswordError !=="" ? "inputError" : "" ?>'
                type="password" 
                name=" password" 
                placeholder="Mot de passe "/>

                <p class="error">
                    <?= $inscriptionPasswordError ?>
                    </p>

                <input  class='<?= $inscriptionRePasswordError !=="" ? "inputError" : "" ?>'
                type="password"
                name=" RePassword" 
                placeholder="Confirmer le mot de passe"/>

                <p class="error">
                    <?= $inscriptionRePasswordError ?>
                
                 <?php 
                 //var_dump($_GET);
                 ?> 
                </p>
                <button>Valider</button>
            </form>
        </section>
        <section>

            <h2>Connexion</h2>
            <form action="/routes/signin.php" method="post">
                <input class='<?= $connexionEmailError !=="" ? "inputError" : "" ?>' 
                type="email" 
                name="email" 
                placeholder="jhon .doe@exemple.com" />
                <p class="error">
            <?= $connexionEmailError ?>
          </p>

                <input class='<?= $connexionPasswordError !=="" ? "inputError" : "" ?>' 
                 type="password"
                  name=" password" 
                  placeholder="Mot de passe">

                  <p class="error">
            <?= $connexionPasswordError ?>
          </p>
                
                <button>Valider</button>
            </form>

            <?php 
           // var_dump($connexionPasswordError);
            ?> 

        </section>



    </main>
</body>

</html>