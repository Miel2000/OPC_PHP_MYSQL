<?php session_start();?>
<?php include('entete.php');?>
<?php include('menu.php');?>
<br>

<?php if(isset($_SESSION["visiteur"])) { ?>
    <nav class="element_menu_nav nav">
            <a class="nav-link" href="secretMenu.php">Secret Menu</a>     
    </nav>
    <div id="corps">
    <?php 
    /* Ecrire dans un fichier */ 

    $monfichier = fopen('../data/compteur.txt', 'r+;');
    $pages_vues = fgets($monfichier);
    $pages_vues += 1; 

        //fseet(pour faire revenir le curseur au début de la ligne -> 'r+')

    fseek($monfichier, 0);
    fputs($monfichier, $pages_vues); 

    fclose($monfichier);

    echo '<p>Cette page a été vue ' . $pages_vues  . ' fois !</p>';
    ?>
</div>

<?php include('pieddepage.php');?>

<?php } else { ?>
<div id="corps">
    <?php 
    /* Ecrire dans un fichier */ 

    $monfichier = fopen('../data/compteur.txt', 'r+;');
    $pages_vues = fgets($monfichier);
    $pages_vues += 1; 

        //fseet(pour faire revenir le curseur au début de la ligne -> 'r+')

    fseek($monfichier, 0);
    fputs($monfichier, $pages_vues); 

    fclose($monfichier);

    echo '<p>Cette page a été vue ' . $pages_vues  . ' fois !</p>';
}?>
</div>
