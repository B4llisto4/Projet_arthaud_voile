<!-- Page du site -->
<?php

Error_reporting(E_ALL);
    include"connexion.php";
    include"fonctionpanier.php";
    include"panier.php";

    // Déclaration des variables de session
    $name=ISSET($_POST['name'])?$_POST['name']:NULL;
	  $price=ISSET($_POST['price'])?$_POST['price']:NULL;
	  $description=ISSET($_POST['description'])?$_POST['description']:NULL;
    $quantite=ISSET($_POST['quantite'])?$_POST['quantite']:NULL;
    $qty_available=ISSET($_POST['qty_available'])?$_POST['qty_available']:NULL;
?>

<!DOCTYPE>
  <html>
    <head>
      <title> Site web Arthaud Voile </title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" id="all-css-4-1" href="https://s0.wp.com/_static/??/wp-content/themes/pub/hever/style.css,/wp-content/mu-plugins/admin-bar/masterbar-overrides/masterbar.css?m=1613409500j&amp;cssminify=yes" type="text/css" media="all">
      <link rel="stylesheet" id="all-css-6-1" href="https://s0.wp.com/_static/??-eJxti8sKgCAQAH8oW6KHdoi+xcTUWF1pjX4/OnSIOg0DM3BmYSgVmwrEQ2Q8XEgMmbiIFXXYgb3eQ3IPa8Ncwf/FZIJGgeToLZ+peBstg+/AIS0a72COU9OPUg69atV2AWWKN+I=?cssminify=yes" type="text/css" media="all">
    </head>

    <body>

      <br>
      <center><h4>Arthaud Voile</h4><br>
        <p>Arthaud Voile, est une boutique en ligne d'article nautique. Ici vous trouverez tout ce dont vous avez besoin pour partir au large de la côte ! Du petit materiel a l'énorme bateau vous serez ainsi comblés !</p>

        <?php

  				$reponse = $bdd->query('SELECT name, price, description, qty_available FROM produit');

          while ($donnees = $reponse->fetch()) {

  			?><br><br>
        <div>
        <img src="voilierevasion.jpg" width="300" height="200">
      </div>
          <?php echo $donnees['name']; ?><br>
          <?php echo $donnees['price']; ?><br>
          <?php echo $donnees['description']; ?><br>
          <select name="quantite"><br>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
          </select><br><br>


          <a href="panier.php?action=ajouterArticle&amp;name&amp;price&amp;quantite" onclick="window.open(this.href, '','toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=600, height=350'); return false;">Ajouter au panier</a>
        <?php
      }
    ?>

    </body>
  </html>
