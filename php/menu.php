 <?php include('entete.php');?>

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
              <!--  <a class="nav-link" href="login.php">Login</a> -->
            <?php }?>
    </nav>
</div>
<br>

