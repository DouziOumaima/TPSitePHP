<?php

session_start();

//var_dump($_SESSION);

include_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/UserController.php";

$userController = UserController::createUserFromId($_SESSION['id']);

//var_dump($userController);
?>

<!DOCTYPE html>
<html lang="en">
<?php
$title = "Page de profil";
include_once "./components/head.php";
?>

<body>
    <?php
    include_once "./components/navbar.php";
    ?>
    <div class="profil-infos">
        <div class="parent">
            <img id="cover" src='<?= "/images/users/" . $_SESSION['cover'] ?>'>

            <img id="avatar" src='<?= "/images/users/" . $_SESSION['avatar'] ?>'>
        </div>

        <p><?= $_SESSION['username'] ?></p>
        <!-- formulaire de changement de cover ,display none , il s'affiche quand on clique sur le cover
        -->
        <div>
            <h2>Changement de photo de couverture</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="file" name="cover" accept="image/png, image/jpeg, image/gif" />
                <button type="submit">Enregistrer</button>
            </form>
        </div>
        <!-- formulaire de changement d'avatar ,display none , il s'affiche quand on clique sur l'avatar 
        -->
        <div>
            <h2>Changement de photo de profil</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="file" name="avatar" accept="image/png, image/jpeg, image/gif" />
                <button type="submit">Enregistrer</button>
            </form>
        </div>

    </div>
    <div>
        <form class="unpost" action="" method="POST" enctype="multipart/form-data">
            <input type="text" name="titre">
            <textarea name="contenu" id="contenu" cols="30" rows="10"></textarea>
            <input type="file" name="ajouterimage" accept="image/png, image/jpeg, image/gif" />
            <button type="submit">Valider</button>
        </form>

    </div>






    </div>

</body>

</html>