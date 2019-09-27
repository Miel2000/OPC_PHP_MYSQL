<?php 

/* Pour dispatcher entre l'affichage de 10 ou 20 commentaires  */ 

include('pdo_connection.php');
if($_POST['pageDistrib'] == 'par10') {
        header('Location: dispatching10.php');
} else {
    header('Location: dispatching20.php');
}
?>