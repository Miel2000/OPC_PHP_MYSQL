
<?php session_start();?>
<?php include('entete.php');?>
<?php include('menu.php');?>
<?php include('pdo_connection.php');?>


<?php if(isset($_SESSION["visiteur"])) { ?>
    <nav class="element_menu_nav nav">
            <a class="nav-link" href="secretMenu.php">Secret Menu</a>     
    </nav>

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
        <input type="radio" id="par10" name="pageDistrib" value="par10" checked>
        <label for="par10">10Com</label>
        <input type="radio" id="par20" name="pageDistrib" value="par20">
        <label for="par20">20Com</label>                       
        <input type="submit">
</form>
<br>
             <!--  affichage commentaires, par défaut 5 -->
<h1>Les 5 derniers commentaires :</h1> <br> 
<div class="chatDisplayed">

    <?php 
    $displayChat = $bdd->query('SELECT * FROM chat ORDER BY id DESC LIMIT 0,5');
    $index = 1;
        while($donnees = $displayChat->fetch()) 
        {
            echo '<p class="chatMsg" style="color:red;"> Commentaire n°'. $index++ .'<br><span style="color:green;"><a href="infoAuteur.php?auteur=' . $donnees['username'] . '">' . htmlspecialchars($donnees["username"]) . ' </a> </span>:'.  '  <span style="color:blue;" > ' .  htmlspecialchars($donnees['msg']) . ' </span> <p class="addTime"> '. $donnees['date_ajout'] . '</p></p><br>';
        }
    $displayChat->closeCursor();
    } else { ?>

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
        <input type="radio" id="par10" name="pageDistrib" value="par10" checked>
        <label for="par10">10Com</label>
        <input type="radio" id="par20" name="pageDistrib" value="par20">
        <label for="par20">20Com</label>                       
        <input type="submit">
</form>
<br>
             <!--  affichage commentaires, par défaut 5 -->
<h1>Les 5 derniers commentaires :</h1> <br> 
<div class="chatDisplayed">

    <?php 
    $displayChat = $bdd->query('SELECT * FROM chat ORDER BY id DESC LIMIT 0,5');
    $index = 1;
        while($donnees = $displayChat->fetch()) 
        {
            echo '<p class="chatMsg" style="color:red;"> Commentaire n°'. $index++ .'<br><span style="color:green;"><a href="infoAuteur.php?auteur=' . $donnees['username'] . '">' . htmlspecialchars($donnees["username"]) . ' </a> </span>:'.  '  <span style="color:blue;" > ' .  htmlspecialchars($donnees['msg']) . ' </span> <p class="addTime"> '. $donnees['date_ajout'] . '</p></p><br>';
        }
    $displayChat->closeCursor();
    } ?>


<?php include('pieddepage.php');?>
     
