<?php session_start();?>
<?php include('entete.php');?>
<?php include('menu.php');?>
<?php include('pdo_connection.php');?>


<?php if(isset($_SESSION["visiteur"])) { ?>
    <nav class="element_menu_nav nav">
            <a class="nav-link" href="secretMenu.php">Secret Menu</a>     
    </nav>
    <div id="corps">
    <!--  Formulaire pour ajouter un jeux à la base de donnée -->
    <h1>Ajoutez un jeu à la base de donnée</h1>
    <form id="addingForm" action="addingToBdd.php" method="get"> 
        <input type="text" name="nom" placeholder="Nom du jeux vidéo"><br>
        <input type="text" name="possesseur" placeholder="Votre pseudo"> <br>
        <input type="text" name="console" placeholder="Console"><br>
        <input type="text" name="prix" placeholder="prix"><br>
        <input type="text" name="nbre_joueurs_max" placeholder="Nombre de joueurs max"><br>
        <textarea type="text" name="commentaires" placeholder="Votre commentaire"></textarea><br>
        <input type="submit">
    </form>
       
    <!--  Affiche la base de données de plusieurs façons différentes -->

    <?php
    $res_jeux = $bdd->query('SELECT COUNT(*) as total FROM jeux_video');
    $nbr_jeux = $res_jeux->fetch();
    
        echo "il y a <strong>" .  $nbr_jeux['total'] . "</strong> jeux vidéos dans la base de donnée <br/>";
        echo "<br>";

    $res_jeux->closeCursor();
    ?>

    <h1>Jeux vidéo les moins cher</h1>
            <!--  Affiche 10 ligne dans un tableau des infos de la bdd jeux_video  et chaques noms des jeux vidéo écrit en majuscule -->
    <table class="table table-striped col-5">
    <?php 
    $allStuff_Jeuxvideo =  $bdd->query('SELECT UPPER(nom) as nom, console, prix, ID FROM jeux_video ORDER BY prix LIMIT 0, 10');
 
        while($donnees =   $allStuff_Jeuxvideo->fetch()) 
            {   echo '<form action="mysql.php?id="' . $donnees['ID'] . ' method="POST">';
                echo '<th>' .  $donnees['console'] . '</th>  <td>' .  $donnees['nom'] . '</td><td>  Prix : ' . $donnees['prix'] . ' €  </td> </tr>';
                echo '</form>';
            }
    $allStuff_Jeuxvideo->closeCursor();
    ?>
    </table>

    <h1>JEUX A MOINS DE  20€ : </h1>
        <!--  Affiche des jeux à moins de 20€ -->
    <?php 
    $nom_console20 =  $bdd->query('SELECT console, nom, prix FROM jeux_video WHERE prix<20 ORDER BY prix');
        while($donnees =   $nom_console20->fetch()) 
            {
                echo '<p>' .  $donnees['console'] . ' ' .  $donnees['nom'] . ' '.  $donnees['prix'] . ' €</p>';
            }
    $nom_console20->closeCursor();
    ?>

   
            <!--  Affiche la base de donnée en liant deux tables de la bdd -->
<!--
            <?php 
          

            $link = $bdd->query('SELECT jeux_video.nom AS nom_jeu, proprietaires.prenom AS prenom_proprietaire
            FROM proprietaires, jeux_video
            WHERE jeux_video.ID_proprietaire = proprietaires.id');
          
  
            while($res = $link->fetch()){
                echo $res['nom_jeu'] . ' = Nom du jeu  <br> ' . $res['prenom_proprietaire'] . ' = Proprietaire du jeu  <br> -  ici je dois incrémenter lors de l\'ajout d\'un jeu le champ ID_proprietaires pour qu\'il puisse linker les tables';

            }
  
            $link->closeCursor();
            ?>
-->

 <h1>NOS JEUX : </h1>
    <h5> Triez par consoles:</h5>
    <form action="mysql.php?console=" method="GET">
        <input type="radio" name="console" value="PC" id="PC" checked="checked" /> <label for="PC">PC</label>
        <input type="radio" name="console" value="XboX" id="XboX" /> <label for="XboX">XboX</label>
        <input type="radio" name="console" value="NES" id="NES" /> <label for="NES">NES</label>
        <input type="radio" name="console" value="Gamecube" id="Gamecube" /> <label for="Gamecube">Gamecube</label>
        <input type="submit">
    </form>



    <div class="midle">
            <!--  Affiche la base de donnée selon la valeur du parametre get -->
    <?php 
    //   local training - /mysql.php?console=PC&prix=15 est possible aussi, ça donne half life 15€ (pas chére)
    $req =  $bdd->prepare('SELECT * FROM jeux_video WHERE console = :console');
    $req->execute(array(
        'console' => $_GET['console']
    ));
        while($donnees = $req->fetch()) 
            {
                echo '<p>' .  $donnees['console'] . ' ' .  $donnees['nom'] . ' - '.  $donnees['prix'] . ' € ' 
                       
                        ;
            }
    $req->closeCursor();
    ?>

    </div>
    <br>
 
    <?php
    $res = $bdd->query('SELECT * FROM jeux_video');
        while ($donnees = $res->fetch())
        {
        ?>
        <div class="card">

            <strong><a href="jeuxvideo.php?jeux=<?php echo $donnees['nom'] .
                                        '&prix=' . $donnees['prix'] . 
                                        '&console=' . $donnees['console'] .
                                        '&id=' . $donnees['ID'] ;?>" ><?php echo $donnees['nom']; ?></a></strong>
            <br />
            <p>
                Le possesseur de ce jeu est : <?php echo $donnees['possesseur']; ?>
                , et il le vend à <?php echo $donnees['prix']; ?> euros !<br />
                Ce jeu fonctionne sur <?php echo $donnees['console']; ?>
                et on peut y jouer à <?php echo $donnees['nbre_joueurs_max']; ?>
                au maximum
                <br />
                <?php echo $donnees['possesseur']; ?> a laissé ces commentaires sur <?php echo $donnees['nom']; ?> : <em><?php echo $donnees['commentaires']; ?></em>
            </p>
        </div>
        <?php
        }
        $res->closeCursor();
        ?>
</div>

<?php include('pieddepage.php');?>

<?php } else { ?>
<div id="corps">

    <!--  Formulaire pour ajouter un jeux à la base de donnée -->

    <h1>Ajoutez un jeu à la base de donnée</h1>
    <form id="addingForm" action="addingToBdd.php" method="get"> 
        <input type="text" name="nom" placeholder="Nom du jeux vidéo"><br>
        <input type="text" name="possesseur" placeholder="Votre pseudo"> <br>
        <input type="text" name="console" placeholder="Console"><br>
        <input type="text" name="prix" placeholder="prix"><br>
        <input type="text" name="nbre_joueurs_max" placeholder="Nombre de joueurs max"><br>
        <textarea type="text" name="commentaires" placeholder="Votre commentaire"></textarea><br>
        <input type="submit">
    </form>
       
    <!--  Affiche la base de données de plusieurs façons différentes -->

    <?php
    $res_jeux = $bdd->query('SELECT COUNT(*) as total FROM jeux_video');
    $nbr_jeux = $res_jeux->fetch();
    
        echo "il y a <strong>" .  $nbr_jeux['total'] . "</strong> jeux vidéos dans la base de donnée <br/>";
        echo "<br>";

    $res_jeux->closeCursor();
    ?>

    <h1>Jeux vidéo les moins cher</h1>

            <!--  Affiche 10 ligne dans un tableau des infos de la bdd jeux_video  et chaques noms des jeux vidéo écrit en majuscule -->

    <table class="table table-striped col-5">
    <?php 
    $allStuff_Jeuxvideo =  $bdd->query('SELECT UPPER(nom) as nom, console, prix, ID FROM jeux_video ORDER BY prix LIMIT 0, 10');
 
        while($donnees =   $allStuff_Jeuxvideo->fetch()) 
            {   echo '<form action="mysql.php?id="' . $donnees['ID'] . ' method="POST">';
                echo '<th>' .  $donnees['console'] . '</th>  <td>' .  $donnees['nom'] . '</td><td>  Prix : ' . $donnees['prix'] . ' €  </td> </tr>';
                echo '</form>';
            }
    $allStuff_Jeuxvideo->closeCursor();
    ?>
    </table>

    <h1>JEUX A MOINS DE  20€ : </h1>

        <!--  Affiche des jeux à moins de 20€ -->

    <?php 
    $nom_console20 =  $bdd->query('SELECT console, nom, prix FROM jeux_video WHERE prix<20 ORDER BY prix');
        while($donnees =   $nom_console20->fetch()) 
            {
                echo '<p>' .  $donnees['console'] . ' ' .  $donnees['nom'] . ' '.  $donnees['prix'] . ' €</p>';
            }
    $nom_console20->closeCursor();
    ?>

    <h1>NOS JEUX : </h1>
    <h5> Triez par consoles:</h5>
    <form action="mysql.php?console=" method="GET">
        <input type="radio" name="console" value="PC" id="PC" checked="checked" /> <label for="PC">PC</label>
        <input type="radio" name="console" value="XboX" id="XboX" /> <label for="XboX">XboX</label>
        <input type="radio" name="console" value="NES" id="NES" /> <label for="NES">NES</label>
        <input type="radio" name="console" value="Gamecube" id="Gamecube" /> <label for="Gamecube">Gamecube</label>
        <input type="submit">
    </form>
    <div class="midle">

            <!--  Affiche la base de donnée selon la valeur du parametre get -->

    <?php 

    //   local training - /mysql.php?console=PC&prix=15 est possible aussi, ça donne half life 15€ (pas chére)

    $req =  $bdd->prepare('SELECT * FROM jeux_video WHERE console = :console');
    $req->execute(array(
        'console' => $_GET['console']
    ));
        while($donnees = $req->fetch()) 
            {
                echo '<p>' .  $donnees['console'] . ' ' .  $donnees['nom'] . ' - '.  $donnees['prix'] . ' € ' 
                       
                        ;
            }
    $req->closeCursor();
    ?>

    </div>
    <br>
 
    <?php
    $res = $bdd->query('SELECT * FROM jeux_video');
        while ($donnees = $res->fetch())
        {
        ?>
        <div class="card">

            <strong><a href="jeuxvideo.php?jeux=<?php echo $donnees['nom'] .
                                        '&prix=' . $donnees['prix'] . 
                                        '&console=' . $donnees['console'] .
                                        '&id=' . $donnees['ID'] ;?>" ><?php echo $donnees['nom']; ?></a></strong>
            <br />
            <p>
                Le possesseur de ce jeu est : <?php echo $donnees['possesseur']; ?>
                , et il le vend à <?php echo $donnees['prix']; ?> euros !<br />
                Ce jeu fonctionne sur <?php echo $donnees['console']; ?>
                et on peut y jouer à <?php echo $donnees['nbre_joueurs_max']; ?>
                au maximum
                <br />
                <?php echo $donnees['possesseur']; ?> a laissé ces commentaires sur <?php echo $donnees['nom']; ?> : <em><?php echo $donnees['commentaires']; ?></em>
            </p>
        </div>
        <?php
        }
        $res->closeCursor();
    }?>
</div>

<?php include('pieddepage.php');?>


