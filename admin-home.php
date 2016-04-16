<?php
     session_start();
     if(isset($_SESSION["login"])){
         echo "You are logged in! This is where the code goes!";
     } else {
         echo "You are not logged in! Please log in to do stuff!";
     }
?>
    