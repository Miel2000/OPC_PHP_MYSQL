<?php session_start();?>
<?php include('entete.php');?>
<?php include('menu.php');?>
<div id="corps">

<?php if(isset($_SESSION["visiteur"])) { ?>
    <nav class="element_menu_nav nav">
            <a class="nav-link" href="secretMenu.php">Secret Menu</a>     
    </nav>


   
<?php 
 if (isset($_GET['nom']) AND isset($_GET['prenom']) AND isset($_GET['repeter']))
 {
     // 1 : On force la conversion en nombre entier
 $nbRepetitions =     (int) $_GET['repeter'];
     // 2 : Le nombre doit être compris entre 1 et 100
     if ($nbRepetitions < 100){
         for($repetition = 0  ; $repetition <= $nbRepetitions ; $repetition++ ) 
         {
                 echo 'Bonjour ' .  $_GET['nom'] . ' ' . $_GET['prenom'] . '<br/>'; 
         }
     } else {
             echo 'Cest bcp trop, choisi un nombre inférieur à 100';
     }   

 } else {
          echo 'add &repeter=8 dans l\'url';
         } 

} else  {
        if (isset($_GET['nom']) AND isset($_GET['prenom']) AND isset($_GET['repeter']))
        {
            // 1 : On force la conversion en nombre entier
        $nbRepetitions =     (int) $_GET['repeter'];
            // 2 : Le nombre doit être compris entre 1 et 100
            if ($nbRepetitions < 100){
                for($repetition = 0  ; $repetition <= $nbRepetitions ; $repetition++ ) 
                {
                        echo 'Bonjour ' .  $_GET['nom'] . ' ' . $_GET['prenom'] . '<br/>'; 
                }
            } else {
                    echo 'Cest bcp trop, choisi un nombre inférieur à 100';
            }   

        } else {
                 echo 'add &repeter=8 dans l\'url';
                } 
            }
        ?>      
    </p>
</div>

  
<?php include('pieddepage.php');?>
     
