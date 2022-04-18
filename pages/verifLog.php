<?php session_start();
    require "../controller.php";
    $mail =  $_POST['mail'];
    $password = $_POST['pwd'];

    var_dump($mail,$password);

    if(!empty($mail) && !empty($password))
   {
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
                $requete = $con->prepare("SELECT ID,MAIL,MDP,PRENOM,NOM,BIRTHDATE,GENRE FROM utilisateurs WHERE MAIL = '$mail'");
                $requete->execute();
                foreach($requete as $row)
                {
                    echo "Utilisateur trouvé! Mot de passe à verifier :...<br>---------------------------------------<br>".$row['MDP']."<br>---------------------------------------<br>";
            
                }
                if(password_verify($password , $row['MDP']))
                {
                    $_SESSION["id"] = $row['ID'];
                    $_SESSION["nom"] = $row['NOM']; 
                    $_SESSION["prenom"] = $row['PRENOM'];
                    $_SESSION["mail"] = $row['MAIL'];
                    $_SESSION["birthdate"] = $row['BIRTHDATE'];
                    $_SESSION["genre"] = $row['GENRE'];
                    $_SESSION['name'] = "arabesque";
                    header('location:../?page=logOk');
                    
                }
                else
                {
                    header('location:../?page=logHs');
                }
                
            }
            catch(PDOexception $e)
            {
                echo "Aucune correspondance trouvée. ".$e;
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
  
