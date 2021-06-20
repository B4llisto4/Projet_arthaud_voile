<!-- Page de redirection, pour aller consulter les commandes ou bien la liste des clients inscrits sur le site -->
<!DOCTYPE>
<html lang="fr">
    <head>
    <title>Redirection</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <style>
        .btn{
            width: 15%;
        }
        </style>
    </head>

    <body>

        <form name="redirection" method="post" action="accueil.php">
        <!-- boutons de selection -->
        <br><br><br>
        <br><br>
        <br><br><br><center><button id="boutonclient" type="button" class="btn btn-primary" >Liste des clients</button><br><br>
        <button id="boutoncommande" type="button" class="btn btn-primary">Liste des commandes</button><br><br>
        <button id="boutonproduit" type="button" class="btn btn-primary">Création des produits</button><br><br>
        <button id="boutonmodification" type="button" class="btn btn-primary">Modification du/des produits</button>
        <button id="boutonsuppression" type="button" class="btn btn-primary">Suppression du/des produits</button>

        <!-- actions des boutons -->
        <script>
            $("#boutonclient").click(function(){
                document.location.href="http://localhost:8080/projet_arthaud_voile/listedesclients.php";
            })
        </script>

        <script>
            $("#boutoncommande").click(function(){
                document.location.href="http://localhost:8080/projet_arthaud_voile/listecommande.php";
            })
        </script>

        <script>
            $("#boutonproduit").click(function(){
                document.location.href="http://localhost:8080/projet_arthaud_voile/ajoutproduit.php";
            })
        </script>

        <script>
            $("#boutonmodification").click(function(){
                document.location.href="http://localhost:8080/projet_arthaud_voile/modificationproduit.php";
            })
        </script>

        <script>
            $("#boutonsuppression").click(function(){
                document.location.href="http://localhost:8080/projet_arthaud_voile/suppressionproduit.php";
            })
        </script>

      <!-- Bouton -->
      <br> <br> <br> <br> <br>  <br><center><button type="submit" action="accueil.php" class="btn btn-primary">Retour</button>
    </body>

</html>
