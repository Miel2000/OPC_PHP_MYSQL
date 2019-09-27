<?php session_start();?>
<?php include('entete.php');?>
<?php include('menu.php');?>

<div class="jumbotron center">

  <!-- pas très propre mais, permet d'afficher les détails du jeu cliqué et d'éviter Yoshi's Island car l'accent venant de la bdd fait tout sauter donc en attendant.. -->

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