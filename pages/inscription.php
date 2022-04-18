<?php
   
   $mail =  $_POST['mail'];
   $password = $_POST['pwd'];
   $prenom = $_POST['prenom'];
   $nom = $_POST['nom'];
   $date = $_POST['date'];
   $genre = $_POST['genre'];

   if(!empty($mail) && !empty($password) && !empty($prenom) && !empty($nom) && !empty($date) && !empty($genre))
   {
       $date = str_replace('/',' ', $date);
       var_dump($mail , $password , $prenom , $nom, $date, $genre);

       try
       {
           $server = "localhost";
           $port = "3306";
           $user = "root";
           $mdp = "";
           $database = "sitenike";

            $con = new PDO("mysql:host=$server;port=$port;dbname=$database; charset=utf8", $user , $mdp);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $requete = $con->prepare("SELECT MAIL FROM utilisateurs WHERE MAIL = '$mail'" );
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
                    try
                    {
                        $requete = $con->query("INSERT INTO utilisateurs VALUES ('', '$mail', '$hash' , '$prenom' , '$nom', '$date', '$genre' )");
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
       echo "Formulaire incomplet. Impossible de traiter le formulaire.";
   } 


?>