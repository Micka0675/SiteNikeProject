<?php 
    $server = "localhost";
    $port = "3306";
    $user = "root";
    $mdp = "";
    $database = "sitenike";
    $iduser = $_SESSION['id'];
?>

<article class="profil">
    <h3>Mon profil</h3>
    <div class="blocListProfile">
        <ul class="list-group">
            <li class="list-group-item">Nom: <?php echo "<strong>".$_SESSION['prenom']."</strong>" ?></li>
            <li class="list-group-item">Prénom: <?php echo "<strong>".$_SESSION['nom']."</strong>" ?></li>
            <li class="list-group-item"> Mail: <?php echo "<strong>".$_SESSION['mail']."</strong>" ?></li>
            <li class="list-group-item">Date de Naissance: <?php echo "<strong>".$_SESSION['birthdate']."</strong>" ?></li>
            <li class="list-group-item">Genre: <?php echo "<strong>".$_SESSION['genre']."</strong>" ?></li>
        </ul>
        <a class="modifProfile" href="./?page=update"><i class="fa-solid fa-pen"></i>Modifier mes informations</a>
    </div>
    <h3>Historique des commandes</h3>
    <div class="blocListHisto">
            <?php 
                try
                {
                    $con = new PDO("mysql:host=$server;port=$port;dbname=$database; charset=utf8", $user , $mdp);
                    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    try
                    {
                        $requete = $con->prepare("SELECT DATE_COMMANDE,TOTAL FROM historique WHERE ID_UTIL = '$iduser'");
                        $requete->execute();
                        if($requete->rowCount()>0)
                        {
                            foreach($requete as $row)
                            {
                                echo "<p class=\"histoLine\"><strong>Date: ".$row['DATE_COMMANDE']." Total: ".$row['TOTAL']."€<strong></p>";
                            }
                        }
                        else
                        {
                            echo "<p>Aucune commande réalisée pour le moment<p>";
                        }
                    }
                    catch(PDOexception $e)
                    {
                        echo "erreur lors de l'envoi de la requete".$e;
                    }
                }
                catch(PDOexception $e)
                {
                    echo "erreur de connection".$e;
                }
            ?>
    </div>
</article>


