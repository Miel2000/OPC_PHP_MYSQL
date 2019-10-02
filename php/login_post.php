<?php 

session_start();
include('pdo_connection.php');

$login = $_POST['login'];
$passUser = $_POST['pass'];



    include('entete.php');
    include('menu.php');

    if(empty($_POST['login']) || empty($_POST['pass'])){
        echo " Veuillez verifier les entrés saissie";

    } else {
// probleme ici pour decrypter le pw de la bdd

        $verifyUser = $bdd->prepare('SELECT nom FROM visiteurs WHERE nom = :username, password_visiteurs = :passUser ');
        $verifyUser->execute(array(
            'username' => $login,
            'pass' => $passUser
        ));
        while($verif = $verifyUser->fetch()) {
            if($verif['nom'] == $login && $verif['pass'] == $passUser) {
                echo 'Yes vous êtes connecté';
               
            }
        }      
    }
?>