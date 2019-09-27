
<?php session_start();?>
<?php include('php/entete.php');?>
<?php include('php/menu.php');?>
<?php include('php/pdo_connection.php');?>

<div id="corps">

<?php
try {
    if(isset($_GET['nom']) AND $_GET['possesseur'] AND $_GET['console'] AND $_GET['prix'] AND $_GET['nbre_joueurs_max'] AND $_GET['commentaires']) {
        $requete = $bdd->prepare('INSERT INTO `jeux_video` (nom, possesseur, console, prix, nbre_joueurs_max, commentaires) VALUES (:nom, :possesseur ,:console, :prix, :nbre_joueurs_max, :commentaires)');
        $requete->execute(array(
                    'nom' => $_GET['nom'],
                    'possesseur'  => $_GET['possesseur'],
                    'console' =>  $_GET['console'], 
                    'prix' => $_GET['prix'], 
                    'nbre_joueurs_max' => $_GET['nbre_joueurs_max'],
                    'commentaires' => $_GET['commentaires'])
                    );

                    echo '<br>';
                    echo '<pre>';
        
            echo '<p> votre jeux : <strong style="color:blue;">' . $_GET['nom'] . '<br></strong> sur <strong style="color:green;">' .  $_GET['console'] . '</strong> au prix de <strong style="color:red;">'.  $_GET['prix'] . '</strong> € <br> à bien été ajouté à notre base de donnée, merci !</p>';
            echo '</pre>';
            
         $requete->closeCursor();
    } else {
        echo "<br><p><span style='color:red;'>Failed</span><br> Un input à mal été rempli</p>";
    }
}
catch (Exception $e)
{
    echo "<br><p class='font-weight-light'>Mauvais inputs</p>";
}
?>
<br>
</div>
<?php include('pieddepage.php');?>