<html>
    <head>
        <meta charset="utf-8"/>
    </head>
</html>
<body>
    

    <?php include('entete.php');?>
    <?php include('menu.php');?>

    <div id="corps">
    <p>YEETBOI</p>

    <?php 
     $error =  $_FILES['monfichier']['error'];

    if(isset($_FILES['monfichier']['type']) AND $_FILES['monfichier']['type'] == "image/gif" AND $_FILES['monfichier']['size'] <= 2000000  ) {
        echo "RIGHT CONDITION : <br/>";
        echo "__________________________________________<br/>";
         
        echo  $_FILES['monfichier']['type'] . " - Format OK" ;
        echo " <br/>__________________________________________<br/>";

    } else {
        echo "WRONG CONDITION : <br/>";
        echo "__________________________________________<br/>";
        echo $_FILES['monfichier']['name']  . " supérieur à 2 000 000 octé  ou mauvais format<br/>";
 
        echo " <br/>__________________________________________<br/>";
    }



    echo "<br/>";
    
    if($_POST['filemsg'] == '') {
        echo "Pas de message, snurf :(";
    } else {
        echo  htmlspecialchars($_POST['filemsg']) ;
    }

    echo "<br/>";
    
     $namefile = $_FILES['monfichier']['name'];

      if(isset($namefile)){
        echo "FICHIER NAME : <strong>" . $_FILES['monfichier']['name'] .'</strong> <br/>';
        echo "Ok : Condition PHP OK <br/>";
        move_uploaded_file($_FILES['monfichier']['tmp_name'], 'uploads/' . basename($_FILES['monfichier']['name']));
      }     
      if($_FILES['monfichier']['name'] == null){ 
        echo "Erreur = " . $error . "<br/>";
        echo "<p style='color:red'> Votre fichier n'a pas été envoyé </p>";
      } else {
          echo "<p style='color:green'>Votre fichier est bien envoyé</p>";
      }
    
    ?>

    </div>

      
    <?php include('pieddepage.php');?>
     
    </html>
</body>