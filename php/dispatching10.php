<?php session_start();?>
<?php include('entete.php');?>
<?php include('menu.php');?>
<?php include('pdo_connection.php');?>
<br>

 <!-- Radio button laissant le choix a nouveaux entre 10 ou 20 -->

<form action="dispatching_post.php" method="POST">
    <input type="radio" id="par10" name="pageDistrib" value="par10">
    <label for="par10">10Com</label>
    <input type="radio" id="par20" name="pageDistrib" value="par20" checked>
    <label for="par20">20Com</label>                       
    <input type="submit">
</form>

 <!-- Affiche 10 commentaires -->

<div id="chat_container">
<?php      
    echo '<br>';
    echo '<h1>Les 10 derniers commentaires</h1>';
    echo '<br>';
    $display10com = $bdd->query('SELECT * FROM chat ORDER BY id DESC LIMIT 0,10');
    $index = 1;
        while($donnees = $display10com->fetch()) 
        {
            echo '<p class="chatMsg" style="color:red;"> Commentaire n°'. $index++ .'<br><span style="color:green;"><a href="infoAuteur.php?auteur=' . $donnees['username'] . '">' . htmlspecialchars($donnees["username"]) . ' </a> </span>:'.  '  <span style="color:blue;" > ' .  htmlspecialchars($donnees['msg']) . ' </span> <p class="addTime"> '. $donnees['date_ajout'] . '</p></p><br>';        }
    $display10com->closeCursor();
?>  


</div>