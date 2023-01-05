<?php

$inscriptionUsernameError = "";

$inscriptionEmailError = "";

$inscriptionPassword = "";



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
} // on n'a pas les msg qui s'affichent
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
                <input type="email" name="email" placeholder="jhon.doe@exemple.com" />
                <input type="text" name="username" placeholder="username">
                <input type="password" name=" password" placeholder="Mot de passe">
                <input type="password" name=" repass" placeholder="Confirmer le mot de passe">
                <button>Valider</button>
            </form>
        </section>
        <section>
            <h2>Connexion</h2>
            <form action="/routes/signin.php" method="post">
                <input type="email" name="email" placeholder="jhon .doe@exemple.com" />
                <input type="password" name=" password" placeholder="Mot de passe">
                <button>Valider</button>
            </form>



        </section>



    </main>
</body>

</html>