<?php include('entete.php');?>

<?php session_start();?>


<?php if(isset($_SESSION["visiteur"])) { ?>
    <?php include('menu.php');?>
    <nav class="element_menu_nav nav">
            <a class="nav-link" href="secretMenu.php">Secret Menu</a>     
    </nav>
    <?php if(!isset($_POST['nasaMDP']) OR $_POST['nasaMDP'] != 'kangourou') {?>  
    <div id ="corps">
        <br>
        <form action="nasa.php"  method="POST">
            <input type="text" name="nasaMDP" placeholder="Not Kangourou">
            <input type="submit">
        </form>
    <?php } else { ?>
            <p> Yesss on est bien</p>
            <p> Vous avez acces aux informations top secret éh éh ! <br></p>
            <p> CODE SECRET : CRD5-GTFT-CK65-JOPM-V29N-24G1-HH28-LLFV<br></p>
    <?php
        } 
?>
</div>

<?php include('pieddepage.php');?>
     
 


<?php } else { ?>


    <?php include('menu.php');?>
<?php if(!isset($_POST['nasaMDP']) OR $_POST['nasaMDP'] != 'kangourou') {?>  
<div id ="corps">
    <br>
    <form action="nasa.php"  method="POST">
        <input type="text" name="nasaMDP" placeholder="Not Kangourou">
        <input type="submit">
    </form>
<?php } else { ?>
        <p> Yesss on est bien</p>
        <p> Vous avez acces aux informations top secret éh éh ! <br></p>
        <p> CODE SECRET : CRD5-GTFT-CK65-JOPM-V29N-24G1-HH28-LLFV<br></p>
<?php
    } 
}
?>
</div>

 
