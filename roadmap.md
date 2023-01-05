# Road map

Créer un site qui permet aux utilisateurs de s'authentifier et d'ajouter des posts.

## Base de donnée

Table: users: id, email, password, avatarURL, coverURL, role  DONE

Table: posts: id, titre, contenu, date, postImage, auteurID DONE


## Accueil
  dans un dossier components:
   header DONE
   navbar DONE 

## Login: 
 
S'authentifier (email unique, username, password).

- Un formulaire pour s'inscrire DONE

- Script pour ajouter un user dans la base de données DONE

- Créer dossier Models (DB, userModel) DONE

- script connexion DB DONE

 - script verification des données saisie (userController) DONE

 - stocker le user a la DB DONE

- formulaire de connexion DONE

- script pour verifier si l'utilisateur a donné un email et password valide Et confirmation de password  DONE

- Stocker les infos (id, email, avatar, role) quelque part dans la session 


## Profil: 
Les informations de l'utilisateur (avatar, username, email, couverture), un formulaire pour créer un post.

- Afficher l'image de couverture de l'utilisateur, sinon afficher une image par défaut. 
- Afficher l'avatar de l'utilisateur, sinon afficher une image par défaut. 

- Un formulaire pour changer l'image de couverture.
- - Un script (/routes/uploadCover.php), enregistre l'image de couverture, et met a jour l'utilisateur dans la base de données.

- Un formulaire pour changer l'image de profil.
- - Un script (/routes/uploadPost.php), enregistre l'image de l'avatar, et met a jour l'utilisateur dans la base de données.

- Afficher le formulaire pour ajouter un post
- - Un script (/routes/uploadPost.php), enregistre l'image, et met a jour l'utilisateur dans la base de données 

- Afficher tous les posts de l'utilisateur:
    - Un post c'est un titre, une image optionnelle, contenu.


## Accueil: 

Afficher tous les posts de tous les utilisateurs ordonnés par date. (les plus récents d'abord).