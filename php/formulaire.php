
<?php session_start();?>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"  crossorigin="anonymous"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
    <div class="element_menu">
    <nav class="element_menu_nav nav">
            <a class="nav-link" href="formulaire.php">Formulaires</a>
            <a class="nav-link"  href="bonjour.php?nom=Einstein&amp;prenom=Matheiuw">Bonjour</a>
            <a class="nav-link"  href="mysql.php?console=PC">mySql</a>
            <a class="nav-link"  href="compteur.php">Compteur</a>
            <a class="nav-link" href="nasa.php">TP1 EXERCICE NASA</a>
            <a class="nav-link" href="minichat.php">Mini-Chat</a>
            <?php if(isset($_SESSION["visiteur"])) { ?>
                 <a class="nav-link" href="deconnexion.php">Deconnexion</a>
            <?php } else { ?>
                <a class="nav-link" href="register.php">Sign in</a>
            <?php }?>
    </nav>
</div>


<?php if(isset($_SESSION["visiteur"])) { ?>
    <nav class="element_menu_nav nav">
            <a class="nav-link" href="deconnexion.php">Secret Menu</a>     
    </nav>
            <!-- 1em formulaire de prise d'informations  -->
    

            <h1>Bienvenue sur mn super site    <?php echo $_SESSION["visiteur"]  ?> </h1>
    <p>
 
        Entrez vos informations : <br>
    </p>
    <div id="corps">
    <form action="formulaire_post.php" method="POST">
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

    <div class="file_sending_box">
        <form action="formulaire_post.php" method="post" enctype="multipart/form-data">
            <br>
            <p>Send me Gif </p>
            <input type="file" name="monfichier"> <br> <br>
            <textarea name="filemsg" rows="8" cols="45" placeholder="Votre message"></textarea><br><br>
            <input type="submit" value="Send Files">
        </form> 
    </div>
</div>
  
<?php include('pieddepage.php');?>
     
<?php } else {?>
<br>
                <!-- 1em formulaire de prise d'informations  -->
    

    <h1>Bienvenue sur mn super site </h1>
    <p>
        Entrez vos informations : <br>
    </p>
    <div id="corps">
    <form action="formulaire_post.php" method="POST">
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

    <div class="file_sending_box">
        <form action="php/cible_envoi.php" method="post" enctype="multipart/form-data">
            <br>
            <p>Send me Gif </p>
            <input type="file" name="monfichier"> <br> <br>
            <textarea name="filemsg" rows="8" cols="45" placeholder="Votre message"></textarea><br><br>
            <input type="submit" value="Send Files">
        </form> 
    </div>
</div>
  
<?php include('pieddepage.php');?>
     
<?php } ?>