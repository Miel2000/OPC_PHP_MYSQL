<?php session_start();?>
<?php include('entete.php');?>
<?php include('menu.php');?>
<br>

<div class="jumbotron center">

  <!-- pas très propre mais, permet d'afficher les détails du jeu cliqué et d'éviter Yoshi's Island car l'accent venant de la bdd fait tout sauter donc en attendant le bon regexp.. -->

  <?php
  if(isset($_GET['ID']) == '10' ){
    echo '<p> Jeu :  Yoshi Island </p>';
    echo '<p> Prix : ' . $_GET['prix'] .' €</p>';
    echo '<p> Console : ' . $_GET['console'] .'</p>';
  } else {  
        echo '<p> Détails </p>';
        echo '<p> Jeu : ' . $_GET['jeux'] . '</p>'; 
        echo '<p> Console : ' . $_GET['console'] .'</p>';
        echo '<p> Prix : ' . $_GET['prix'] .' €</p>';
  }
  ?>
</div>