<!-- Page Authentification de l'admin -->
<?php
Error_reporting(E_ALL);
    include"connexion.php";

    // Déclaration des variables
    $id_admin=ISSET($_POST['id_admin'])?$_POST['id_admin']:NULL;
    $email=ISSET($_POST['email'])?$_POST['email']:NULL;
    $password=ISSET($_POST['password'])?$_POST['password']:NULL;
    $name=ISSET($_POST['name'])?$_POST['name']:NULL;

    // Insertion des données dans la base de données
    if(!empty($email)){
        try{
            $pwd=password_hash($password, PASSWORD_DEFAULT);
            $sql = "insert into admin(email, password, name) values('$email','$pwd', '$name')";
            $bdd->exec($sql);
            //echo "Votre demande a été prise en compte";
			      //header("Location:accueil_admin.php");
		} catch(PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
      ?>

<!DOCTYPE>
<html lang="fr">
    <head>
        <title>Authentification Admin</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css" />

        <style>
        .form-control{
            width: 300px;
        }
        </style>
    </head>

    <body>
      <form name="toto" method="post" action="redirection.php">
        <br><br><br>
        <center><h4>Authentification de l'administrateur</h4><br><br>

        <!-- champ email -->
        <center><div class="form-group">
          <input name="email" type="email" class="form-control" placeholder="Adresse Email">
        </div>

        <!-- champ mdp -->
        <div class="form-group">
          <input name="password" type="password" class="form-control" placeholder="Mot de passe">
        </div>

        <!-- champ nom -->
        <div class="form-group">
          <input name="name" type="text" class="form-control" placeholder="Nom">
        </div>

        <!-- bouton de submit -->
        <button type="submit" class="btn btn-primary">Authentification...</button>

      </form>
    </body>
</html>
