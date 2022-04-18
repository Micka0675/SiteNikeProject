<?php
   session_start();
   $mail =  $_POST['mail'];
   $password = $_POST['pwd'];
   $prenom = $_POST['prenom'];
   $nom = $_POST['nom'];
   $date = $_POST['date'];
   $genre = $_POST['genre'];
   $iduser = $_SESSION['id'];

   if(!empty($mail) && !empty($password) && !empty($prenom) && !empty($nom) && !empty($date) && !empty($genre))
   {
       echo "Formulaire complet!...<br> Traitement des données...<br>";
       $date = str_replace('/',' ', $date);
       var_dump($mail , $password , $prenom , $nom, $date, $genre);
       echo "Tentative de connexion à la Base de données...<br>";
       try
       {
           $server = "localhost";
           $port = "3306";
           $user = "root";
           $mdp = "";
           $database = "sitenike";

            $con = new PDO("mysql:host=$server;port=$port;dbname=$database; charset=utf8", $user , $mdp);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connexion à la BDD réalisée avec succès!...<br>Hachage du mot de passe...<br>-----------------------------------------<br>";

            $requete = $con->prepare("SELECT MAIL FROM utilisateurs WHERE MAIL = '$mail' AND $iduser != ID");
            $requete->execute();

            if($requete->rowCount()>0)
            {
                echo "Le mail existe déjà";
            }
            else
            {
                try
                {

                    $hash = password_hash($password,PASSWORD_DEFAULT);
                    echo $hash."<br>-----------------------------------------<br>Tentative d'envoi de la requete...<br>";

                    try
                    {
                        $requete = $con->prepare("UPDATE utilisateurs SET MAIL = '$mail', MDP ='$hash' , PRENOM ='$prenom' , NOM ='$nom', BIRTHDATE ='$date', GENRE = '$genre'  WHERE '$iduser' = ID");
                        $requete->execute();
                        $requete2 = $con->prepare("SELECT ID,MAIL,MDP,PRENOM,NOM,BIRTHDATE,GENRE FROM utilisateurs WHERE '$iduser' = ID");
                        $requete2->execute();
                        foreach($requete2 as $row2)
                        {
                            $_SESSION["id"] = $row2['ID'];
                            $_SESSION["nom"] = $row2['NOM']; 
                            $_SESSION["prenom"] = $row2['PRENOM'];
                            $_SESSION["mail"] = $row2['MAIL'];
                            $_SESSION["birthdate"] = $row2['BIRTHDATE'];
                            $_SESSION["genre"] = $row2['GENRE'];
                            $_SESSION['name'] = "arabesque";
                        
                        }
                        
                        header("Location:http://localhost/sitenike/index.php");
                    }
                    catch(PDOexception $e)
                    {
                        echo "Echec de l'envoi de la requete: ".$e;
                    }
                }
                catch(PDOexception $e)
                {
                    echo "Echec du hashage de password.";
                }
            }
       }
       catch(PDOexception $e)
       {
            echo "La connexion à la BDD a échoué. ".$e;
       }
   }
   else
   {
        echo "form incomplete";
   }


?>