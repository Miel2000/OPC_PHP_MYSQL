<?php session_start();?>
<?php include('entete.php');?>
<?php include('menu.php');?>
<?php include('pdo_connection.php');?>
<br>

 <!-- Radio button laissant le choix a nouveaux entre 10 ou 20 -->

<form action="dispatching_post.php" method="POST">
            <input type="radio" id="par10" name="pageDistrib" value="par10">
            <label for="par10">10Com</label>
            <input type="radio" id="par20" name="pageDistrib" value="par20">
            <label for="par20">20Com</label>                       
        <input type="submit">
</form>

 <!-- Affiche 20 commentaires -->
 
<div id="corps">
<?php
    echo '<br>';
    echo '<h1>Les 20 derniers commentaires</h1>';
    echo '<br>';
    $display10com = $bdd->query('SELECT * FROM chat ORDER BY id DESC LIMIT 0,20');
    $index = 1;
        while($donnees = $display10com->fetch()) 
        {
            echo '<p class="chatMsg" style="color:red;"> Commentaire n°'. $index++ .'<br>  <span style="color:green;"> ' .  htmlspecialchars($donnees['username']) .'</span>:'.  '  <span style="color:blue;" > ' .  htmlspecialchars($donnees['msg']) . ' </span></p><br>';
        }
    $display10com->closeCursor();
?>
</div>