
<?php session_start();?>
<?php include('php/entete.php');?>
<div class="element_menu">
    <nav class="element_menu_nav nav">
            <a class="nav-link" href="php/formulaire.php">Formulaires</a>
            <a class="nav-link"  href="php/bonjour.php?nom=Einstein&amp;prenom=Matheiuw">Bonjour</a>
            <a class="nav-link"  href="php/mysql.php?console=PC">mySql</a>
            <a class="nav-link"  href="php/compteur.php">Compteur</a>
            <a class="nav-link" href="php/nasa.php">TP1 EXERCICE NASA</a>
            <a class="nav-link" href="php/minichat.php">Mini-Chat</a>
    </nav>
</div>
                <!-- 1em formulaire de prise d'informations  -->
<link rel="stylesheet" type="text/css" href="css/style.css">
<div id="corps">
    <h1>Bienvenue sur mn super site </h1>
    <p>
        Entrez vos informations : <br>
    </p>

    <form action="logged.php" method="POST">
        <p><input type="text" name="prenom" placeholder="Prenom"/></p>
        <p><input type="text" name="nom" placeholder="Nom"/></p>
        <p><input type="text" name="email" placeholder="Email"/></p>
        <textarea name="message" rows="8" cols="45" placeholder="Votre message"></textarea><br><br>

        <p>Sport préféré :</p>
        <select name="choix">
            <option value="Football">Football</option>
            <option value="Rugby">Rugby</option>
            <option value="Tennis">Tennis</option>
            <option selected="selected" value="Freezbe">Freezbe</option>
        </select>

        <p>Coche ce que tu kiff de uf :</p>
        <input type="checkbox" name="lasagne" id="lasagne" /> <label for="lasagne">Lasagne</label>
        <input type="checkbox" name="tartiflette" id="tartiflette" /> <label for="tartiflette">Tartiflette</label>
        <input type="checkbox" name="fraise" id="fraise" /> <label for="fraise">Fraise</label>

        
        <p> Aimez-vous les arbres ?</p>
        <input type="radio" name="arbres" value="oui" id="oui" checked="checked" /> <label for="oui">Oui</label>
        <input type="radio" name="arbres" value="non" id="non" /> <label for="non">Non</label>
        <p><input type="submit" /></p>
    </form>


            <!-- 2em formulaire pour l'envoi de fichier gif/jpg -->

    <form action="php/cible_envoi.php" method="post" enctype="multipart/form-data">
        <p>Send me Gif </p>
        <input type="file" name="monfichier"> <br>
        <textarea name="filemsg" rows="8" cols="45" placeholder="Votre message"></textarea><br><br>
        <input type="submit" value="Send Files">
    </form>
</div>
  
<?php include('php/pieddepage.php');?>
     
