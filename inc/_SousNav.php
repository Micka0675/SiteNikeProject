
<?php 
    if(!isset($_SESSION))
    {
        session_start();
    }
?>
<div class="sousNav">
    <div class="jorConv">
        <img src="images/jordan.png" alt="logoJordan">
        <img src="images/converse.png" alt="logoConverse">
    </div>
    <div class="blocRight">
        <?php
        if(!empty($_SESSION))
        {
            if($_SESSION['name'] == "arabesque")
            {
                ?>
                <div class="logDiv" id="logDiv">
                    
                    <p>Bienvenue <?php echo " <strong> " .$_SESSION['prenom']." ".$_SESSION['nom']."</strong></p>";?>
                    <a id="monCompte" class="monCompte" href="./?page=user">Mon compte</a>
                    <!--<a id="deconnection" href="./?page=logOut ">Se déconnecter</a>-->
                    <a id="deconnection" class="logOut" href="pages/logOut.php ">Se déconnecter</a>
                    <a  class ="linkPanier" href="./?page=42">
                        <i class="fa-solid fa-basket-shopping panierImg" id="commande"></i>
                    </a>
                    
                </div>
                <?php
            }
            else
            {
                echo "<a id=\"identify\" class=\"identify\">s'identifier</a>";

            }
        }
        else
        {
            echo "<p id=\"identify\" class=\"identify\">s'identifier</p>";  
        }
        ?>
    </div>
</div>