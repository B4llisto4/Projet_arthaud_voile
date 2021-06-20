<!-- Page de connexion du client -->
<?php
session_start(); 
if(isset($_POST['connexion'])) { // si le bouton "Connexion" est appuyé
    
    // empty vérifie à la fois si le champ est vide et si le champ existe belle et bien (is set)
    if(empty($_POST['username'])) {
        echo "Le champ username est vide.";
    } else {
        
        if(empty($_POST['password'])) {
            echo "Le champ Mot de passe est vide.";
        } else {
            // les champs sont bien posté et pas vide
            $username = htmlentities($_POST['username'], ENT_QUOTES, "ISO-8859-1"); 
            $password = htmlentities($_POST['password'], ENT_QUOTES, "ISO-8859-1");
            //on se connecte à la base de données:

              try {
                $bdd = new PDO('mysql:host=localhost;dbname=arthaud_voile', 'user', 'user');
              }
              catch(Exception $e) {
                die('Erreur : '.$e->getMessage());
              }

            if(!$mysqli){
                echo "Erreur de connexion à la base de données.";
            } else {
                // on fait maintenant la requête dans la base de données pour rechercher si ces données existe et correspondent:
                $Requete = mysqli_query("SELECT name, password FROM client WHERE username = '".$name."' AND password = '".$password."'");//si vous avez enregistré le mot de passe en md5() il vous suffira de faire la vérification en mettant mdp = '".md5($MotDePasse)."' au lieu de mdp = '".$MotDePasse."'
                
                if(mysqli_num_rows($bdd) == 0) {
                    echo "Le pseudo ou le mot de passe est incorrect, le compte n'a pas été trouvé.";
                } else {
                    // on ouvre la session avec $_SESSION:
                    $_SESSION['username'] = $username; 
                    echo "Vous êtes à présent connecté !";
                }
            }
        }
    }
}
?>

<!DOCTYPE>
  <html>
    <head>
      <title> Connexion du client </title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" href="style.css" />

      <style>
      .form-control{
          width: 300px;
      }
      </style>
    </head>

    <body>
      <form name="toto" method="post" action="site.php">
        <br><br><br>
        <center><h4>Connexion au site</h4><br>
          <label class="form-check-label" for="exampleCheck1">Vous n'avez pas encore de compte ?</label><br>

          <a href="compteclient.php">M'inscrire</a>

        <!-- champ Identifiant -->
          <div class="form-group"><br>
            <input name="username" type="text" class="form-control" placeholder="Identifiant">
          </div>

        <!-- champ Mot de passe -->
          <div class="form-group">
            <input name="password" type="password" class="form-control" placeholder="Mot de passe">
          </div>

        <!-- Bouton -->
          <button type="submit" class="btn btn-primary">Connexion</button>

      </form>
    </body>
  </html>
