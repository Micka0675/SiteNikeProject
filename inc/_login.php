<?php
    require "controller.php"; 
?>
<div class="blocIdentify" id="blocConnect">
    <div class="blocImage">
        <div class="blocClose">
            <i id ="cross" class="fa-solid fa-xmark"></i>
        </div>
        <div class="blocNike">
            <img src="images/nike.png" alt="logoNike" class="logoNike2">
        </div>
    </div>
    <h3 class ="blocTitre">VOTRE IDENTIFIANT POUR REJOINDRE NIKE</h3>
    <form class="blocInput" method="post" action="pages/verifLog.php">
        <label for="mail2"></label>
        <input id="mail2"  class="inpt1" type="email" name="mail" placeholder="Adresse e-mail">
        <label for="pwd2"></label>
        <input id ="pwd2" class="inpt1" type="password" name="pwd" placeholder="Mot de Passe">
        <p class="politiqueConf">En vous connectant, vous acceptez de vous conformer à la Politique de confidentialité et aux Conditions générales de Nike.</p>
        <input type="submit" class="sub" value="CONNECTION">
    </form>
    <p class="parSign">Vous n'êtes pas encore membre ? 
        <a id="sign" class="linkSign">Rejoignez-nous.</a>
    </p>
</div>
<div class="blocSignIn" id="blocSignIn">
    <div class="blocImage">
        <div class="blocClose">
            <i id ="cross2" class="fa-solid fa-xmark"></i>
        </div>
        <div class="blocNike">
            <img src="images/nike.png" alt="logoNike" class="logoNike2">
        </div>
    </div>
    <h3 class ="blocTitre">INSCRIPTION</h3>
    <form class="blocInput2" method="post" action="pages/inscription.php">
        
        <label for="mail"></label>
        <input id="mail" name="mail" class="inpt1" type="email" placeholder="Adresse e-mail">

        <label for="pwd"></label>
        <input id ="pwd" name="pwd" class="inpt1" type="password" placeholder="Mot de passe">
        
        <label for="prenom"></label>
        <input id ="prenom" name="prenom" class="inpt1" type="text" placeholder="Prénom">

        <label for="nom"></label>
        <input id ="nom" name="nom" class="inpt1" type="text" placeholder="Nom">

        <label for="date"></label>
        <input id ="date" name="date" class="inpt1" type="text" placeholder="Date de naissance">
        <p>Vous etes:</p>
        <div class="genre">
            <input id ="Homme" name="genre" value="Homme" class="btn-check" type="radio" checked>
            <label for="Homme" class="btn btn-secondary">Un homme</label>
            <input id ="Femme" name="genre" value="Femme" class="btn-check" type="radio">
            <label for="Femme" class="btn btn-secondary">Une femme</label>
        </div>
    
        <input type="submit" class="sub" value="SOUMETTRE">
    </form>
    <p class="parSign2">Vous etes deja membre ? 
        <a id="identify2" class="linkSign2">identifiez vous.</a>
    </p>
</div>