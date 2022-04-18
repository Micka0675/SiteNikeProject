var blocId = document.getElementById("blocConnect");
var wrapper = document.getElementById("wrapper");
var blocSignIn = document.getElementById("blocSignIn");
var searchBar = document.getElementById("searchBar");
var touche = "";
document.addEventListener("click", function(e)
{
    if(e.target && e.target.id == "identify")
    {
        displayConnect();
    }
    if(e.target && e.target.id == "identify2")
    {
        displayConnect2();
    }
    if(e.target && e.target.id == "cross")
    {
        removeConnect();
    }
    if(e.target && e.target.id == "cross2")
    {
        removeConnect2();
    }
    if(e.target && e.target.id == "sign")
    {
        activeSign();
    }
    
});

document.addEventListener('keyup' , function(e)
{
    if(e.target && e.target.id == "searchBar")
    {
        giveHint(e);
    }
});

function displayConnect()
{
    blocId.style.display = "flex";
    wrapper.classList.add("wrapper");
    wrapper.classList.remove("default");
}

function removeConnect()
{
    blocId.style.display = "none";
    wrapper.classList.add("default");
    wrapper.classList.remove("wrapper");
}

function removeConnect2()
{
    blocSignIn.style.display = "none";
    wrapper.classList.add("default");
    wrapper.classList.remove("wrapper");
}

function displayConnect2()
{
    blocId.style.display = "flex";
    blocSignIn.style.display = "none";
    wrapper.classList.add("wrapper");
    wrapper.classList.remove("default");
}

function activeSign()
{
    blocId.style.display = "none";
    blocSignIn.style.display = "flex";
    wrapper.classList.add("wrapper");
    wrapper.classList.remove("default");
}

function giveHint(e)
{
    var suggest = document.getElementById("suggest");
    if(e.key != 'Enter' && e.which <= 90 && e.which >= 48 )
    {
        //Id d'affichage de la reponse
        suggest.style.visibility = "hidden";
        
        touche = touche + e.key;
        
        //declaration de l'objet XMLHttpRequest et Debut de l'ecriture avec Ajax
        const xhttp = new XMLHttpRequest();
        //declaration de la fonction qui traite le resultat - ici on souhaite afficher la reponse dans suggest
        xhttp.onload = function()
        {
            suggest.innerHTML = this.responseText;
            suggest.style.visibility = "visible";
        };
        console.log(touche);
        //cible de la requete ajax
        xhttp.open("GET", "pages/suggestion.php?q="+touche);
        // envoi de la requete ajax
        xhttp.send();
       
    }
    if (e.key == 'Backspace')
    {
        touche = touche.slice(0, -1);
        suggest.style.visibility = "hidden";
    }
    if(searchBar.value == "")
    {
        touche = "";
        suggest.style.visibility = "hidden";
    }
    

        
    
    
}


