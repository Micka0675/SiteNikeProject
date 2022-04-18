<?php
    if(isset($_POST["idCom"]) && !empty($_POST["idCom"]))
    {
        $server = "localhost";
        $port = "3306";
        $user = "root";
        $mdp = "";
        $database = "sitenike";
        $idCom = $_POST["idCom"];

        try
        {
            $con = new PDO("mysql:host=$server;port=$port;dbname=$database; charset=utf8", $user , $mdp);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            try
            {
                $requete = $con->prepare("DELETE FROM commandes WHERE ID = '$idCom'");
                $requete -> execute();
                header("Location:http://localhost/sitenike/?page=42");
            }
            catch(PDOexception $e)
            {
                echo "Erreur lors de l'envoi de la requete. Veuillez essayer de nouveau.".$e;
            }
        }
        catch(PDOexception $e)
        {
            echo "Erreur de connection. Veuillez essayer de nouveau.".$e;
        }
        
    }
    else
    {
        echo "erreur. Veuillez essayer de nouveau.";
    }
?>