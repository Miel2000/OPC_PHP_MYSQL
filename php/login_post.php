<?php 

session_start();
include('pdo_connection.php');

$login = $_POST['login'];
$handle = true;


    include('entete.php');
    include('menu.php');

    if(empty($_POST['login']) || empty($_POST['pass'])){
        echo " Veuillez verifier les entrés saissie";

    } else {


        $verifyUser = $bdd->prepare('SELECT nom FROM visiteurs WHERE nom = :username ');
        $verifyUser->execute(array(
            'username' => $login 
        ));
        while($verif = $verifyUser->fetch()) {
            if($verif['nom'] == $login) {
                echo 'nop nop déso existe déjà';
                $handle = false;
            }
        }
     
        
      
    if($handle){
            
                $pass_crypte = hash('sha256' , $_POST['pass']);
                $requete = $bdd->prepare('INSERT INTO `visiteurs` (nom, password_visiteurs) VALUES (:nom , :pass)');
                $requete->execute(array(
                                'nom' => $login,
                                'pass' => $pass_crypte
                                ));

                                echo '<br>';
                                echo '<pre>';
                                echo 'Bonjour '  . $login . ', tu es bien enregistré sur notre base de donnée';
                                echo '</pre>';

                $requete->closeCursor();
                
                
                }
                $_SESSION["visiteur"] = $login;
    }

   
               
    

      
            

            

    

?>