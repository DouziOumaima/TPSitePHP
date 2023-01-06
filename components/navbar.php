<nav>
    <!-- ici y aura un menu button (on utilise boostrap pour icone )-->
    <!-- pas besoin de session start elle est inclus directement dans les pages donc il y accedra  automatiquement -->
    <ul>
        <li> <a href="/index.php">Accueil</a>
        </li>
        <li> <a href="/login.php">Se connecter</a>
        </li>
        <li> <a href="/profil.php"> Profil </a>
        </li>
        <li> <a href=""> Se deconnecter </a>
        </li>

        <?php 
        //  faire un (if isset)(session) pour tester est ce que dans cette session on a la clé id
        //  si la session existe et y a le id on affiche le profil sinon else Se connecter
        ?>
    </ul>

</nav>
<!-- peco  -----   < ? = .... ? > -->