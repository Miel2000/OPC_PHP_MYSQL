<?php session_start();?>
<?php include('entete.php');?>
<?php include('menu.php');?>
<?php include('pdo_connection.php');?>

<br>
<?php 



if(isset($_GET['auteur'])) {

    $countAuteur= $bdd->prepare('SELECT COUNT(*) as total, username FROM chat WHERE username = :user_post');
    $countAuteur->execute(array(
        'user_post' => $_GET['auteur']
    ));

    while($count = $countAuteur->fetch()) {
            if($count['total'] == 0) {
                echo "<br>Wrong way, dont not tuch value of GET parameterz";
            } else {
        echo $count['username'] . ' à laissé ' . $count['total'] . ' commentaires <br> ';
}}}
 


if(isset($_GET['auteur'])) {
    if(!$_GET['auteur'] == '') {
    $displayAuteur= $bdd->prepare('SELECT * FROM chat WHERE username = :user_post');
    $displayAuteur->execute(array(
        'user_post' => $_GET['auteur']
    ));
    $index = 1;
        while($donnees = $displayAuteur->fetch()) 
        {
            echo ' <br><p class="chatMsg" style="color:red;"><span style="color:green;">' . htmlspecialchars($donnees["username"]) . ' </a> </span>:'.  '  <span style="color:blue;" > ' .  htmlspecialchars($donnees['msg']) . ' </span> <p class="addTime"> '. $donnees['date_ajout'] . '</p></p><br>';
        }
    $displayAuteur->closeCursor();

} else {
    echo "Veuillez verifier le nom d'auteur";
}}
    ?>