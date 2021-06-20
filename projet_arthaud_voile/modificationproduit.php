<!-- Page de modification de produits -->
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
            //$sql = "update produit set name = '$name', price = '$price', description = '$description', qty_available = '$qty_available' where id_produit = 1)";
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
			<title> Liste des produits </title>
      		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
			    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">-->
      		<link rel="stylesheet" id="all-css-4-1" href="https://s0.wp.com/_static/??/wp-content/themes/pub/hever/style.css,/wp-content/mu-plugins/admin-bar/masterbar-overrides/masterbar.css?m=1613409500j&amp;cssminify=yes" type="text/css" media="all">
			    <link rel="stylesheet" id="all-css-6-1" href="https://s0.wp.com/_static/??-eJxti8sKgCAQAH8oW6KHdoi+xcTUWF1pjX4/OnSIOg0DM3BmYSgVmwrEQ2Q8XEgMmbiIFXXYgb3eQ3IPa8Ncwf/FZIJGgeToLZ+peBstg+/AIS0a72COU9OPUg69atV2AWWKN+I=?cssminify=yes" type="text/css" media="all">

			<br><br><center><u><h3>Liste des produits</h3></u></center><br><br>
		</head>

		<body>


    <form name="produits" method="post" action="redirection.php">
		<figure class="wp-block-table alignfull">
			<table>
				<thead>
					<tr>
						<th>Nom</th>
						<th>Prix €</th>
						<th>Description</th>
						<th>Quantité</th>
					</tr>
				</thead>
			<?php
				try {
					$bdd = new PDO('mysql:host=localhost;dbname=arthaud_voile', 'user', 'user');
				}
				catch(Exception $e) {
					die('Erreur : '.$e->getMessage());
				}
			?>

			<?php

				$reponse = $bdd->query('SELECT name, price, description, qty_available FROM produit');

        while ($donnees = $reponse->fetch()) {

			?>
				<tbody>
					<tr>
					<td><input type="text" name="name" value="<?php echo $donnees['name']; ?>"</td>
					<td><input type="text" name="name" value="<?php echo $donnees['price']; ?>"</td>
					<td><input type="text" name="name" value="<?php echo $donnees['description']; ?>"</td>
					<td><input type="text" name="name" value="<?php echo $donnees['qty_available']; ?>"</td>

          <?php
				}
			?>
					</tr>
				</tbody>
			</table>
		</figure>	<br>
    <center><button type="submit" class="btn btn-primary">Valider</button><br>
	<br><center><button type="submit" class="btn btn-primary">Retour</button>
    </form>
		</body>
</html>
