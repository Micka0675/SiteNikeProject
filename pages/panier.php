<article class="commande">
    <h3>Ma Commande</h3>
        <?php
        //Si la methode post a été employée via le formulaire
        $date = date("Y-m-d");
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {    
            //  si la superglobale $_SESSION existe, qu'elle n'est pas vide et qu'elle a pour nom "arabesque"
            if (isset($_SESSION) && !empty($_SESSION) && $_SESSION['name'] == "arabesque")
            {
                // Si les valeurs nom,taille,imgCom et price sont bien stockées dans les superglobales $_POST, qu'elles existent et qu'elles ne sont pas vides
                if(!empty($_POST['nomProd']) && !empty($_POST['taille']) && !empty($_POST['imgCom']) && !empty($_POST['price']))
                {
                    // affectation des variables de type $_POST à des variables de type $_SESSION
                    $_SESSION['nomProd'] = $_POST['nomProd'];
                    $_SESSION['taille'] = $_POST['taille'];
                    $_SESSION['imgCom'] = $_POST['imgCom'];
                    $_SESSION['price'] = $_POST['price'];

                    // Les variables sont renommées
                    $id = $_SESSION['id'];
                    $nom = $_SESSION['nomProd'];
                    $taille = $_SESSION['taille'];
                    $prix = $_SESSION['price'];
                    $imgCom = $_SESSION['imgCom'];
                    $total = 0;
                    
                    // variables d'information de connection serveur
                    $server = "localhost";
                    $port = "3306";
                    $user = "root";
                    $mdp = "";
                    $database = "sitenike";

                    // affectation à $con de la connexion à la base de donées
                    $con = new PDO("mysql:host=$server;port=$port;dbname=$database; charset=utf8", $user , $mdp);

                    // affectation de l'attribut erreur mode à $con
                    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    try
                    {
                        // preparation de la requete
                        $requete = $con->prepare("INSERT INTO commandes VALUES ('','$id','$nom','$taille','$prix','$imgCom')");
                        // execution de la requete
                        $requete->execute();
                        try
                        {
                            $requete = $con->prepare("SELECT ID,NUMCLIENT,NOM,TAILLE,PRICE,IMG FROM commandes WHERE '$id' = NUMCLIENT");
                            $requete->execute();
                            // pour chaque ligne de resultat
                            foreach($requete as $row)
                            {
                                $idCom = $row['ID'];
                                echo "<form method=\"post\" action=\"pages/delete.php\" class=\"ligneCom\"> <img src=\"".$row['IMG']."\" class=\"minImg\"> ".$row['NOM']." Size ".$row['TAILLE']." : ".$row['PRICE']."€  <input readonly class=\"valueSelected\" name=\"idCom\" value=".$idCom." checked><input type=\"submit\" class=\"delete\" id=\"delete\" value=\"Suprimer\"></form><br>";
                                // intval() transforme une varchar en int, floatval() retourne un type nombre à virgule.
                                $total = $total + floatval($row['PRICE']); 
                            }
                            if($requete->rowCount()>0)
                            {
                                echo "<form method=\"post\" action=\"./?page=utf8\">Total de la commande : ".$total."€<br><input readonly class=\"valueSelected\" name=\"date\" value=".$date." checked><br><input readonly class=\"valueSelected\" name=\"total\" value=".$total." checked><br><input type=\"submit\" class=\"validCom\" value=\"Valider ma commande\"></form>";
                            }
                            else
                            {
                                echo "Le panier est vide.";
                            }
                        }
                        catch(PDOexception $e)
                        {
                            echo "Erreur lors de l'execution de la requete 2. ".$e;
                        }
                        
                    }
                    catch(PDOexception $e)
                    {
                        echo "Erreur lors de l'execution de la requete 1. ".$e;
                    }
                }
            }
            else
            {
                echo "Merci de vous identifier pour passer commande.";
            }
        }
        else
        {
            if(isset($_SESSION) && !empty($_SESSION) && $_SESSION['name'] == "arabesque")
            {
                $id = $_SESSION['id'];
                // $nom = $_SESSION['nomProd'];
                // $taille = $_SESSION['taille'];
                // $prix = $_SESSION['price'];
                // $imgCom = $_SESSION['imgCom'];

                $total = 0;
                $server = "localhost";
                $port = "3306";
                $user = "root";
                $mdp = "";
                $database = "sitenike";
                $con = new PDO("mysql:host=$server;port=$port;dbname=$database; charset=utf8", $user , $mdp);
                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    try
                    {
                        $requete = $con->prepare("SELECT ID,NUMCLIENT,NOM,TAILLE,PRICE,IMG FROM commandes WHERE '$id' = NUMCLIENT");
                        $requete->execute();
                        foreach($requete as $row)
                        {
                            $idCom = $row['ID'];
                            echo "<form method=\"post\" action=\"pages/delete.php\" class=\"ligneCom\"><img src=\"".$row['IMG']."\" class=\"minImg\"> ".$row['NOM']." Size : ".$row['TAILLE']." : ".$row['PRICE']."€ <input readonly class=\"valueSelected\" name=\"idCom\" value=".$idCom." checked><input type=\"submit\" class=\"delete\" id=\"delete\" value=\"Suprimer\"></form><br>";
                            $total = $total + floatval($row['PRICE']); 
                        }
                        if($requete->rowCount()>0)
                        {
                            echo "<form method=\"post\" action=\"./?page=utf8\">Total de la commande : ".$total."€<br><input readonly class=\"valueSelected\" name=\"date\" value=".$date." checked><br><input readonly class=\"valueSelected\" name=\"total\" value=".$total." checked><br><input type=\"submit\" class=\"validCom\" value=\"Valider ma commande\"></form>";
                        }
                        else
                        {
                            echo "Le panier est vide.";
                        }
                    }
                    catch(PDOexception $e)
                    {
                        echo "Erreur lors de l'execution de la requete 1. ".$e;
                    }
            }
            else
            {
                echo "Merci de vous identifier pour passer commande.";
            }
        }
        ?>
</article>


