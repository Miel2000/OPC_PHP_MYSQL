<?php
session_start();
            /* Insert l'username et le message  dans la table chat */ 

include('pdo_connection.php');

if($_POST['username'] AND $_POST['msg'] != "") {
   
    $req = $bdd->prepare('INSERT INTO chat (username, msg, date_ajout) VALUES(:username, :msg, NOW())');
    $req->execute(array(
        'username' => $_POST['username'],
        'msg' => $_POST['msg'],
    ));
    
} 



header('Location: minichat.php');
?>