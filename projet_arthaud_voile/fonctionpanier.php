<?php
  function creationPanier(){
     if (!isset($_SESSION['panier'])){
        $_SESSION['panier']=array();
        $_SESSION['panier']['name'] = array();
        $_SESSION['panier']['price'] = array();
        $_SESSION['panier']['quantite'] = array();
     }
     return true;
  }

  function ajouterArticle($name,$price,$quantite){

   //Si le panier existe
   if (creationPanier())
   {
      //Si le produit existe déjà on ajoute seulement la quantité
      $positionProduit = array_search($name,  $_SESSION['panier']['name']);

      if ($positionProduit !== false)
      {
         $_SESSION['panier']['quantite'][$positionProduit] += $quantite ;
      }
      else
      {
         //Sinon on ajoute le produit
         array_push( $_SESSION['panier']['name'],$name);
         array_push( $_SESSION['panier']['price'],$price);
         array_push( $_SESSION['panier']['quantite'],$quantite);

      }
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}

    function supprimerArticle($name){
     //Si le panier existe
     if (creationPanier())
     {
        //Nous allons passer par un panier temporaire
        $tmp=array();
        $tmp['name'] = array();
        $tmp['price'] = array();
        $tmp['quantite'] = array();

        for($i = 0; $i < count($_SESSION['panier']['name']); $i++)
        {
           if ($_SESSION['panier']['name'][$i] !== $name)
           {
              array_push( $tmp['name'],$_SESSION['panier']['name'][$i]);
              array_push( $tmp['price'],$_SESSION['panier']['price'][$i]);
              array_push( $tmp['quantite'],$_SESSION['panier']['quantite'][$i]);
           }

        }
        //On remplace le panier en session par notre panier temporaire à jour
        $_SESSION['panier'] =  $tmp;
        //On efface notre panier temporaire
        unset($tmp);
     }
     else
     echo "Un problème est survenu veuillez contacter l'administrateur du site.";
    }

    function modifierQTeArticle($name,$quantite){
     //Si le panier existe
     if (creationPanier())
     {
        //Si la quantité est positive on modifie sinon on supprime l'article
        if ($quantite > 0)
        {
           //Recherche du produit dans le panier
           $positionProduit = array_search($name,  $_SESSION['panier']['name']);

           if ($positionProduit !== false)
           {
              $_SESSION['panier']['quantite'][$positionProduit] = $quantite ;
           }
        }
        else
        supprimerArticle($name);
     }
     else
     echo "Un problème est survenu veuillez contacter l'administrateur du site.";
    }


    function MontantGlobal(){
   $total=0;
   for($i = 0; $i < count($_SESSION['panier']['name']); $i++)
   {
      $total += $_SESSION['panier']['quantite'][$i] * $_SESSION['panier']['price'][$i];
   }
   return $total;
}
?>
