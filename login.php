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
                <input type="email" name="email" placeholder="jhon .doe@exemple.com" />
                <input type="text" name="username" placeholder="username">
                <input type="password" name=" password" placeholder="Mot de passe">
                <input type="password" name=" password" placeholder="Confirmer le mot de passe">
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