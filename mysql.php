
<?php 
        try{
            $bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8', 'root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            }
            catch (Exception $e) {
                die('ERREUR : ' . $e->getMessage());
            }
?>

<html>
    <head>
        <meta charset="utf-8"/>
    </head>
<body>
    <?php session_start();?>
    <?php include('entete.php');?>
    <?php include('menu.php');?>
    <div id="corps">
    <h1>Jeux vidéo BDD </h1>
        <table class="table table-striped col-5">
                <?php 
             
                $allStuff_Jeuxvideo =  $bdd->query('SELECT * FROM jeux_video ORDER BY prix LIMIT 0, 10');

                while($donnees =   $allStuff_Jeuxvideo->fetch()) 
                    {
                        echo '<th>' .  $donnees['console'] . '</th>  <td>' .  $donnees['nom'] . '</td><td>  Prix : ' . $donnees['prix'] . ' €</td></tr>';
                    }
                $allStuff_Jeuxvideo->closeCursor();
                ?>
        </table>
        <h1>JEUX A MOINS DE  20€ : </h1>

        <?php 
            $nom_console20 =  $bdd->query('SELECT console, nom, prix FROM jeux_video WHERE prix<20 ORDER BY prix');
            while($donnees =   $nom_console20->fetch()) 
            {
                echo '<p>' .  $donnees['console'] . ' ' .  $donnees['nom'] . ' '.  $donnees['prix'] . ' €</p>';
            }
            $nom_console20->closeCursor();

        ?>

        <h1>NOS JEUX : </h1>
        <p>Consoles:</p>
        <form action="mysql.php?console=" method="GET">
            <input type="radio" name="console" value="PC" id="PC" checked="checked" /> <label for="PC">PC</label>
            <input type="radio" name="console" value="XboX" id="XboX" /> <label for="XboX">XboX</label>
            <input type="radio" name="console" value="NES" id="NES" /> <label for="NES">NES</label>
            <input type="radio" name="console" value="Gamecube" id="Gamecube" /> <label for="Gamecube">Gamecube</label>
            <input type="submit">
        </form>
        <div class="midle">
         <?php 

                echo 'Cette erreur est normale, il ';
//  url localhost training - includes/mysql.php?console=PC&prix=15 donne half life 15€ (pas chére)
            $req =  $bdd->prepare('SELECT console, nom, prix FROM jeux_video WHERE console = :console');
            $req->execute(array(
                'console' => $_GET['console']
            ));
            while($donnees =   $req->fetch()) 
            {
                echo '<p>' .  $donnees['console'] . ' ' .  $donnees['nom'] . ' - '.  $donnees['prix'] . ' €</p>';
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
