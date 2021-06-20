<!-- Page de création de compte client-->
<?php
Error_reporting(E_ALL);
    include"connexion.php";

    // Déclaration des variables
    $name=ISSET($_POST['name'])?$_POST['name']:NULL;
    $lastname=ISSET($_POST['lastname'])?$_POST['lastname']:NULL;
    $email=ISSET($_POST['email'])?$_POST['email']:NULL;
    $password=ISSET($_POST['password'])?$_POST['password']:NULL;
    $address=ISSET($_POST['address'])?$_POST['address']:NULL;

    // Insertion des données dans la base de données
    if(!empty($email)){
        try{
            $pwd=password_hash($password, PASSWORD_DEFAULT);
            $sql = "insert into client(name, lastname, email, password, address) values('$name', '$lastname', '$email','$pwd', '$address')";
            $bdd->exec($sql);
            //echo "Votre demande a été prise en compte";
			      header("Location:connexioncompteclient.php");
		} catch(PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
      ?>

<!DOCTYPE>
<html lang="fr">
    <head>
        <title>Création du compte client</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css" />

        <style>
        .form-control{
            width: 300px;
        }
        </style>
    </head>

    <body>
      <form name="toto" method="post">
        <br><br><br>
        <center><h4>Création du compte client</h4><br><br>
          <label class="form-check-label" for="exampleCheck1">Vous avez déjà un compte ?</label><br>

          <a href="connexioncompteclient.php">Me connecter</a>

        <!--champ nom -->
        <center><div class="form-group">
            <input name="name" type="text" class="form-control" placeholder="Nom">
        </div>

        <!--champ prénom -->
        <div class="form-group">
            <input name="lastname" type="text" class="form-control" placeholder="Prénom">
        </div>

        <!--champ email -->
        <div class="form-group">
            <input name="email" type="email" class="form-control" placeholder="Adresse Email">
        </div>

        <!--champ pwd -->
        <div class="form-group">
          <input name="password" type="password" class="form-control" placeholder="Mot de passe">
        </div>

        <!--champ adresse -->
        <div class="form-group">
          <input name="address" type="text" class="form-control" placeholder="Adresse">
        </div>

        <!--champ bouton création -->
        <button type="submit" class="btn btn-primary">Création du compte</button>

      </form>
    </body>
</html>
