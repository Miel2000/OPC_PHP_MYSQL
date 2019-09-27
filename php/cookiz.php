<?php setcookie('voiture', 'AUDI TT X800', time() + 365*24*3600, null, null, false, true);?>
<?php include('entete.php');?>
<?php include('menu.php');?>
<?php session_start();
    $voiture = $_COOKIE['voiture'];
    $_COOKIE['email'] = 'yoyo@yoyo.com';
    $_COOKIE['nom'] = "Jozef";
?>

<div id="corps">
    <h1>KI JO SUIS C TR2 SIMPL </h1>
    <p> <?php echo "Cooooookie testing : <br>" . $_COOKIE['email'] . " " .  $_COOKIE['nom'] . ", je posséde une " . $voiture; ?></p>
    <p>
        alaabsz jevien du lavandou<br>
    </p>
</div>

<?php include('pieddepage.php');?>
     
