

<html>
    <head>
        <meta charset="utf-8"/>
    </head>

<body>
    
    <?php session_start(); 
     
    ?>
    <?php include('entete.php');?>
    <?php include('menu.php');?>


  <br>

    <div id="corps">
<?php 

/// 1 ouvre le fichier 

$monfichier = fopen('compteur.txt', 'r+;');

//2 on fera ici nos opérations sur le fichier
$pages_vues = fgets($monfichier);
    // 2.1 on lit la première ligne du fichier,
$pages_vues += 1; 
    // 2.2 fseet($monfichier pour faire revenir le curseur à la ligne avec 'r+')
fseek($monfichier, 0);
fputs($monfichier, $pages_vues);

// 3 quand on a fini , on ferme le fichier

fclose($monfichier);

echo '<p>Cette page a été vue ' . $pages_vues  . ' fois !</p>';


?>



<?php include('pieddepage.php');?>