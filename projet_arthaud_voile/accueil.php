<!-- Page d'accueil du site -->
<!DOCTYPE>
    <html lang="fr">
        <head>
            <br><br><title> Bienvenue sur Arthaud Voile </title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        </head>

        <body>
            <!-- Titre + les deux boutons qui renvoient vers des actions (redirection sur d'autres pages) -->
            <br><br><br><br><center><h1> Arthaud Voile </h1>
            <br><br><br><center><button id="boutonadmin" type="button" class="btn btn-primary" >Espace Administrateur</button><br><br>
             <button id="boutonclient" type="button" class="btn btn-primary">Espace Client</button>

            <!-- Les actions de redirection des boutons -->
            <script>
                $("#boutonadmin").click(function(){
                    document.location.href="http://localhost:8080/projet_arthaud_voile/admin.php";
                })
            </script>

            <script>
                $("#boutonclient").click(function(){
                    document.location.href="http://localhost:8080/projet_arthaud_voile/compteclient.php";
                })
            </script>
        </body>

    </html>
