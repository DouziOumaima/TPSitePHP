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


//var_dump($_FILES);

?>

<body>
    <?php
    include_once "./components/navbar.php";
    ?>
    <div class="profil-infos">
        <div class="parent">
            <img id="cover" src='<?= "/images/covers/" . $_SESSION['cover'] ?>'>

            <img id="avatar" src='<?= "/images/Avatars/" . $_SESSION['avatar'] ?>'>
        </div>

        <p><?= $_SESSION['username'] ?></p>
        <!-- formulaire de changement de cover ,display none , il s'affiche quand on clique sur le cover
        -->
        <div>
            <h2>Changement de photo de couverture</h2>
            <form action="./routes/uploadCover.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="cover" accept="image/png, image/jpeg, image/gif" />
                <button type="submit">Enregistrer</button>
            </form>
        </div>
        <!-- formulaire de changement d'avatar ,display none , il s'affiche quand on clique sur l'avatar 
        -->
        <div>
            <h2>Changement de photo de profil</h2>
            <form action="./routes/uploadAvatar.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="avatar" accept="image/png, image/jpeg, image/gif" />
                <button type="submit">Enregistrer</button>
            </form>
        </div>

    </div>
    <div>
        <form class="post" action="/routes/uploadPost.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="titre" placeholder="Ajouter un titre">
            <textarea name="contenu" id="contenu" cols="30" rows="10" placeholder="Ajouter un contenu"></textarea>
            <input type="file" name="ajouterimage" accept="image/png, image/jpeg, image/gif" />
            <button type="submit">Valider</button>
        </form>

    </div>






    </div>

</body>

</html>