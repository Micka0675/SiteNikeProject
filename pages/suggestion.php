<?php
   $search = $_GET['q'];



   $server = "localhost";
   $port = "3306";
   $user = "root";
   $mdp = "";
   $database = "sitenike";
    
    try
    {
        $con = new PDO("mysql:host=$server;port=$port;dbname=$database; charset=utf8", $user , $mdp);
        // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try
        {
            $requete = $con->prepare("SELECT NOM FROM produits WHERE NOM = '$search'" );
            $requete->execute();
            if($requete->rowCount()>0)
            {
                foreach($requete as $row)
                {
                   if($row['NOM'] == 'paris')
                   {
                       echo "<a href=\"./?page=psghome\"><p>".$row['NOM']."</p><a>";
                   }
                   if($row['NOM'] == 'liverpool')
                   {
                       echo "<a href=\"./?page=liv\"><p>".$row['NOM']."</p><a>";
                   }
                   if($row['NOM'] == 'france')
                   {
                       echo "<a href=\"./?page=frahom\"><p>".$row['NOM']."</p><a>";
                   }
                   if($row['NOM'] == 'barca')
                   {
                       echo "<a href=\"./?page=barca\"><p>".$row['NOM']."</p><a>";
                   }
                   if($row['NOM'] == 'pays bas')
                   {
                       echo "<a href=\"./?page=holl\"><p>".$row['NOM']."</p><a>";
                   }
                   if($row['NOM'] == 'crampon')
                   {
                       echo "<a href=\"./?page=crampons\"><p>".$row['NOM']."</p><a>";
                   }
                   if($row['NOM'] == 'maillot')
                   {
                       echo "<a href=\"./?page=maillots\"><p>".$row['NOM']."</p><a>";
                   }
                }
            }
            else
            {
                echo "<p class=\"noResult\"><em>Pas de résultat.</em></p>";
            }
        }
        catch(PDOexception $e)
        {
            echo "la requete a echouuuéééé.";
        }
    }
    catch(PDOexception $e)
    {
        echo "aie aie aie, ça c'est mal passé.";
    }
?>