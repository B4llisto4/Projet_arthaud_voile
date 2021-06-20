<?php
$name=ISSET($_POST['name'])?$_POST['name']:NULL;
$price=ISSET($_POST['price'])?$_POST['price']:NULL;

$erreur = false;

$action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
if($action !== null)
{
   if(!in_array($action,array('ajout', 'suppression', 'refresh')))
   $erreur=true;

   //récuperation des variables en POST ou GET
   $name = (isset($_POST['name'])? $_POST['name']:  (isset($_GET['name'])? $_GET['name']:null )) ;
   $price = (isset($_POST['price'])? $_POST['price']:  (isset($_GET['price'])? $_GET['price']:null )) ;
   $quantite = (isset($_POST['quantite'])? $_POST['quantite']:  (isset($_GET['quantite'])? $_GET['quantite']:null )) ;

   //Suppression des espaces verticaux
   $name = preg_replace('#\v#', '',$name);
   //On vérifie que $p soit un float
   $price = floatval($price);

   //On traite $q qui peut être un entier simple ou un tableau d'entiers

   if (is_array($quantite)){
      $quantite = array();
      $i=0;
      foreach ($quantite as $contenu){
         $quantite[$i++] = intval($contenu);
      }
   }
   else
   $quantite = intval($quantite);

}

if (!$erreur){
   switch($action){
      Case "ajout":
         ajouterArticle($name,$quantite,$price);
         break;

      Case "suppression":
         supprimerArticle($name);
         break;

      Case "refresh" :
         for ($i = 0 ; $i < count($quantite) ; $i++)
         {
            modifierQTeArticle($_SESSION['panier']['name'][$i],round($quantite[$i]));
         }
         break;

      Default:
         break;
   }
}
?>

<?php
session_start();
include_once("fonctionpanier.php");

echo '<?xml version="1.0" encoding="utf-8"?>';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
<title>Votre panier</title>
</head>
<body>

<form method="post" action="panier.php">
<table style="width: 400px">
    <tr>
        <td colspan="4">Votre panier</td>
    </tr>
    <tr>
        <td>Nom</td>
        <td>Prix</td>
        <td>Quantité</td>
        <td>Action</td>
    </tr>


    <?php
    if (creationPanier())
    {
        $nbArticles=count($_SESSION['panier']['name']);
        if ($nbArticles <= 0)
        echo "<tr><td>Votre panier est vide </ td></tr>";
        else
        {
            for ($i=0 ;$i < $nbArticles ; $i++)
            {
                echo "<tr>";
                echo "<td>".htmlspecialchars($_SESSION['panier']['name'][$i])."</ td>";
                echo "<td><input type=\"text\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['panier']['quantite'][$i])."\"/></td>";
                echo "<td>".htmlspecialchars($_SESSION['panier']['price'][$i])."</td>";
                echo "<td><a href=\"".htmlspecialchars("panier.php?action=suppression&l=".rawurlencode($_SESSION['panier']['name'][$i]))."\">XX</a></td>";
                echo "</tr>";
            }

            echo "<tr><td colspan=\"2\"> </td>";
            echo "<td colspan=\"2\">";
            echo "Total : ".MontantGlobal();
            echo "</td></tr>";

            echo "<tr><td colspan=\"4\">";
            echo "<input type=\"submit\" value=\"Rafraichir\"/>";
            echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";

            echo "</td></tr>";
        }
    }
    ?>
</table>
</form>
</body>
</html>
