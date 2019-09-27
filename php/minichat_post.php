<?php
            /* Insert l'username et le message  dans la table chat */ 

include('php/pdo_connection.php');

if($_POST['username'] AND $_POST['msg'] != "") {
 
    $req = $bdd->prepare('INSERT INTO chat (username, msg) VALUES(:username, :msg)');
    $req->execute(array(
        'username' => $_POST['username'],
        'msg' => $_POST['msg']
    ));
} 

header('Location: minichat.php');
?>