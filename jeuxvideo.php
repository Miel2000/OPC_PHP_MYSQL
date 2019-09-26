<?php session_start(); 
     
     ?>
     <?php include('entete.php');?>
     <?php include('menu.php');?>
 
     <div class="jumbotron center">
   <?php

if(isset($_GET['ID']) == '10' ){
    
    echo '<p> Jeu :  Yoshi Island </p>';
    echo '<p> Prix : ' . $_GET['prix'] .' €</p>';
    echo '<p> Console : ' . $_GET['console'] .'</p>';
} else {
        echo '<p> Jeu : ' . $_GET['jeux'] . '</p>';
        echo '<p> Prix : ' . $_GET['prix'] .' €</p>';
        echo '<p> Console : ' . $_GET['console'] .'</p>';
}

   ?>
   </div>