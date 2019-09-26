<?php include('entete.php');?>
<?php include('menu.php');?>



<h2> Fiche Perso </h2>
<?php 

if(isset($_POST['prenom']) AND $_POST['nom'] AND $_POST['email'] AND $_POST['message']){
    echo '<p> Prenom :<strong> ' . htmlspecialchars($_POST['prenom']) . '</strong></p>';
    echo '<p> Nom : ' . htmlspecialchars($_POST['nom']) . '</p>';
    echo '<p> Email : ' . htmlspecialchars($_POST['email']) . '</p>';
    echo '<p> Message : ' . htmlspecialchars($_POST['message']) . '</p>';

} else {
    echo "Données manquantes";
}

?>

<h3> Sports </h3>

<?php 
if(isset($_POST['choix'])) {
    echo " Votre sport préféré est le : " .  $_POST['choix'];
} 
?>

<h3> Cuisine </h3>
<p>
    <?php 
            if(isset($_POST['lasagne']) == "on" ) {
                echo " Vous aimez les lasagnes " ;
            }  else {
                echo " Vous n'aimez pas les lasagnes" ;
            }
    ?>
</p>
<p>
    <?php
    if(isset($_POST['tartiflette']) == "on" ) {
        echo " Vous aimez la tartiflette " ;
    }  else {
        echo " Vous n'aimez pas la tartiflette" ;
    }
    ?>
</p>
<p>
    <?php
    if(isset($_POST['fraise']) == "on" ) {
        echo " Vous aimez les fraises " ;
    }  else {
        echo " Vous n'aimez pas les fraises" ;
    }
?>
</p>
<h3> Arbres ? </h3>
<?php 

    if($_POST['arbres'] == 'oui') {
        echo '<p> Arbres : OUI'; 
    } else {
        echo '<p> Arbres : NON';
    }
?>

