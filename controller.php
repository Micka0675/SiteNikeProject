<?php

    

    if(isset($_GET['page']) || !empty($_GET['page']))
    {
        $page = $_GET['page'];

        switch($page)
        {
            case 'maillots': 
                $chemin = "./pages/maillots.php";
            
            break;

            case 'crampons':
                $chemin = "./pages/crampons.php";
            
            break;  

            case 'accueil':
                $chemin = "./pages/main.php";
            
            break; 

            case 'infos':
                $chemin = "./pages/infos.php";
            
            break; 

            case 'logOk':
                $chemin = "./pages/main.php";
               
            break;

            case 'logHs':
                $chemin = "./pages/main.php";
                
            break;

            case 'logOut':
                $chemin = "./pages/logOut.php";
            break;

            case 'nation':
                $chemin = "./pages/maillotsnation.php";
            break;

            case 'fantom':
                $chemin = "./pages/produits/crampons/fantom.php";
            break;

            case 'mercurial':
                $chemin = "./pages/produits/crampons/mercurial.php";
            break;

            case 'tiempo':
                $chemin = "./pages/produits/crampons/tiempo.php";
            break;

            case 'psghome':
                $chemin = "./pages/produits/maillots/psghome.php";
            break;

            case 'psgaway':
                $chemin = "./pages/produits/maillots/psgaway.php";
            break;

            case 'liv':
                $chemin = "./pages/produits/maillots/liverhome.php";
            break;

            case 'frahom':
                $chemin = "./pages/produits/maillots/pays/francehome.php";
            break;

            case 'fraext':
                $chemin = "./pages/produits/maillots/pays/franceaway.php";
            break;

            case 'barca':
                $chemin = "./pages/produits/maillots/barca.php";
            break;

            case 'holl':
                $chemin = "./pages/produits/maillots/pays/paysbas.php";
            break;

            case '42':
                $chemin = "./pages/panier.php";
            break;

            case 'utf8':
                $chemin = "./pages/envoiCommande.php";
            break;

            case 'user':
                $chemin = "./pages/profil.php";
            break;

            case 'update':
                $chemin = "./pages/updateprofil.php";
            break;

            default:
                $chemin = "./pages/main.php";
                
        }
    }
    else
    {
        $chemin = "./pages/main.php";
        
    }

?>