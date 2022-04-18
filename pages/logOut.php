<?php 

    if(!isset($_SESSION))
    {
        session_start();
    }

    //print_r($_SESSION);

    $_SESSION = array();
    session_destroy();

    
        // echo "<meta http-equiv =\"refresh\" content=\"0\"> ";
        header("Location:http://localhost/sitenike/index.php");
    
    
    

    // if(isset($_GET['page']) || !empty($_GET['page']))
    // {

    // }
    
?>

    