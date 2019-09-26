    <?php
     setcookie('voiture', 'AUDI TT X800', time() + 365*24*3600, null, null, false, true);
         ?>

<html>
    <head>
        <meta charset="utf-8"/>
    </head>
</html>
<body>

    <?php include('entete.php');?>
    <?php include('menu.php');?>

    <?php session_start();
        $voiture = $_COOKIE['voiture'];
        $myUserEmail = $_SESSION['email'];
    ?>

    <!-- Corps -->

    <div id="corps">
        <h1>KI JO SUIS C TR2 SIMPL </h1>
        <p> <?php echo "Cooooookie testing :" . $_SESSION['prenom'] . " " .  $myUserEmail . " " . $voiture; ?></p>
        <p>
           alaabsz jevien du lavandou<br>
        </p>
    </div>


  
    <?php include('pieddepage.php');?>
     
    </html>
</body>