<form class="updateform" method="post" action="pages/updatetreatment.php">
    <h3 class ="blocTitre">Modifier mon profil</h3>
    <label for="email"></label>
    <input id="email" name="mail" class="inpt1" type="email" placeholder="Adresse e-mail" required>
    <label for="mdp"></label>
    <input id ="mdp" name="pwd" class="inpt1" type="password" placeholder="Mot de passe" required>
    
    <label for="name"></label>
    <input id ="name" name="prenom" class="inpt1" type="text" placeholder="Prénom" required>
    <label for="firstname"></label>
    <input id ="firstname" name="nom" class="inpt1" type="text" placeholder="Nom" required>
    <label for="bdate"></label>
    <input id ="bdate" name="date" class="inpt1" type="text" placeholder="Date de naissance" required>
    <p>Vous etes:</p>
    <div class="genre">
        <input id ="man" name="genre" value="Homme" class="btn-check" type="radio" checked>
        <label for="man" class="btn btn-secondary">Un homme</label>
        <input id ="woman" name="genre" value="Femme" class="btn-check" type="radio">
        <label for="woman" class="btn btn-secondary">Une femme</label>
    </div>

    <input type="submit" class="sub" value="SOUMETTRE">
</form>