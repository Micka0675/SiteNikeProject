<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css" >
    <title>Document</title>
</head>
<body>
    <div class="confirmCommande">
    <?php
        if(isset($_POST['date']) && !empty($_POST['date']) && isset($_POST['total']) && !empty($_POST['total']) && isset($_SESSION['id']) && !empty($_SESSION['id']))
        {
            $date = $_POST['date'];
            $total = $_POST['total'];
            $util = $_SESSION['id'];

            try
            {
                $server = "localhost";
                $port = "3306";
                $user = "root";
                $mdp = "";
                $database = "sitenike";

                $con = new PDO("mysql:host=$server;port=$port;dbname=$database; charset=utf8", $user , $mdp);
                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                try
                {
                    $requete = $con->prepare("INSERT INTO historique VALUES('$util', '$date', '$total','')");
                    $requete->execute();
                    try
                    {
                        $requete = $con->prepare("DELETE FROM commandes WHERE NUMCLIENT = $util");
                        $requete->execute();
                        echo "<p>Merci ".$_SESSION['prenom']." ".$_SESSION['nom'].", votre commande du ".$date." pour un montant de ".$total."€ a bien été prise en compte.</p><p>Vous pouvez venir la récupérer au Nike Store des Champs Elysées.</p> A bientot chez Nike!<p><a href=\"http://localhost/sitenike/?page=\"><input type=\"button\" value=\"Retour à l'accueil\"></a></p></div>"; 
                    }
                    catch(PDOexception $e)
                    {
                        echo"echec de la suppression.".$e;
                    }
                }
                catch(PDOexception $e)
                {
                    echo "requete échouée".$e;
                }

            }
            catch(PDOexception $e)
            {
                echo "erreur".$e;
            }
        }
        else
        {
            echo "Erreur.";
        }
    ?>
    </div>
</body>
</html>