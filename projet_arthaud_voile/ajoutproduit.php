<!-- Page d'ajout/ modification et suppression de produit -->
<?php
Error_reporting(E_ALL);
    include"connexion.php";

    $name=ISSET($_POST['name'])?$_POST['name']:NULL;
	  $price=ISSET($_POST['price'])?$_POST['price']:NULL;
	  $description=ISSET($_POST['description'])?$_POST['description']:NULL;
    $qty_available=ISSET($_POST['qty_available'])?$_POST['qty_available']:NULL;

    //var_dump($_POST);
    if(!empty($description)){
        try{
            $sql = "insert into produit(name, price, description, qty_available) values('$name','$price', '$description', '$qty_available')";
            $bdd->exec($sql);
            //echo "Votre demande a été prise en compte";
			header("Location:redirection.php");
		} catch(PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
?>

<!DOCTYPE>
<html lang="fr">
    <head>
        <title>Ajout de produit</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css" />

        <style>
        .form-control{
            width: 300px;
        }
    </style>
    </head>

    <body>
      <form name="produit" method="post">

          <br><br><br><br><br>
          <center><h4>Ajout de produit</h4><br><br>

          <!-- champ Nom du produit -->
      <center><div class="form-group">
        <input name="name" type="text" class="form-control" placeholder="Nom du produit">
      </div>

        <!-- champ prix -->
      <div class="form-group">
        <input name="price" type="text" class="form-control" placeholder="Définir un prix">
      </div>

        <!-- champ description du produit -->
      <div class="form-group">
        <input name="description" type="text" class="form-control" placeholder="Description du produit">
      </div>

        <!-- champ Quantité du produit -->
      <div class="form-group">
        <input name="qty_available" type="text" class="form-control" placeholder="Quantité du produit">
      </div>

        <!-- Bouton -->
      <button type="submit" class="btn btn-primary">Création du produit</button>

</form>
    </body>
</html>
