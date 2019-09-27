
<?php session_start();?>
<?php include('entete.php');?>
<?php include('menu.php');?>
<?php include('pdo_connection.php');?>

<div id="corps">
<br>

            <!-- Mini-chat Formulaire -->

<form action="minichat_post.php" method="POST">
        <input type="text" name="username" placeholder="votre pseudo" > <br> <br>
        <textarea type="text" name="msg" placeholder="votre message"></textarea> <br> <br>   
        <input type="submit">
</form>
            <!--  choix affichage commentaires par 10 ou 20 -->

<form action="dispatching_post.php" method="POST">
        <input type="radio" id="par10" name="pageDistrib" value="par10">
        <label for="par10">10Com</label>
        <input type="radio" id="par20" name="pageDistrib" value="par20">
        <label for="par20">20Com</label>                       
        <input type="submit">
</form>
<br>
             <!--  affichage commentaires, par défaut 5 -->

<div class="chatDisplayed">
    <h1>Les 5 derniers commentaires :</h1> <br>

    <?php 
    $displayChat = $bdd->query('SELECT * FROM chat ORDER BY id DESC LIMIT 0,5');
    $index = 1;
        while($donnees = $displayChat->fetch()) 
        {
            echo '<p class="chatMsg" style="color:red;"> Commentaire n°'. $index++ .'<br>  <span style="color:green;"> ' .  htmlspecialchars($donnees['username']) .'</span>:'.  '  <span style="color:blue;" > ' .  htmlspecialchars($donnees['msg']) . ' </span></p><br>';
        }
    $displayChat->closeCursor();
    ?>
</div>

<?php include('pieddepage.php');?>
     
