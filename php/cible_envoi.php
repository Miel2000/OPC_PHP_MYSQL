<?php include('entete.php');?>
<?php include('menu.php');?>
<div id="corps">
  <h1>YEETBOI</h1>

    <?php 
    $error =  $_FILES['monfichier']['error']; // 0 = ça functionne & 4 = ça fonctionne pas

        // Condition pour affichier si Oui ou Non les conditions requise pour l'envoi de fichier sont OK 

    if(isset($_FILES['monfichier']['type']) AND $_FILES['monfichier']['type'] == "image/gif" AND $_FILES['monfichier']['size'] <= 2000000  ) {
        echo "Condition OK";
        echo "<br/>__________________________________________<br/>";
    } else {
        echo "Condition ERROR <br>";
        echo "__________________________________________<br/>";
    }

    echo "<br/>";

      // verifie si l'utilisateur à poster un message avec le fichier

    if($_POST['filemsg'] == '') {
        echo "Pas de message, snurf :(";
    } else {
        echo  htmlspecialchars($_POST['filemsg']) ;
    }

    echo "<br/>";
    echo "__________________________________________<br/>";
    
      // Conditionnement pour uploader le gif/jpg sur le serveur

    $namefile = $_FILES['monfichier']['name'];

    if(isset($namefile)){
      move_uploaded_file($_FILES['monfichier']['tmp_name'], '../uploads/' . basename($_FILES['monfichier']['name']));
    }     
    if($_FILES['monfichier']['name'] == null OR $_FILES['monfichier']['type'] != "image/gif"){ 

      echo $_FILES['monfichier']['type'] . ' Fichier non conforme<br>' ;
      echo "<p style='color:red'> Votre fichier n'a pas été envoyé </p>";

    } else {

      echo  $_FILES['monfichier']['name'] . " - Format OK <br>" ;
      echo "Fichier inférieur à 2Mo<br/>";
      echo "<p style='color:green'>Votre fichier est bien envoyé</p>";

    }
    ?>
</div>
  
<?php include('pieddepage.php');?>
  
