<html>
    <head>
        <meta charset="utf-8"/>
    </head>
</html>
<body>

<?php include('entete.php');?>
<?php include('menu.php');?>

    <?php 

            if(!isset($_POST['nasaMDP']) OR $_POST['nasaMDP'] != 'kangourou') {
    ?>  
            <div id ="corps">
            <br>
            <form action="nasa.php"  method="POST">
                <input type="text" name="nasaMDP" placeholder="Not Kangourou">
                <input type="submit" name="" >
            </form>
        
            <?php } else { ?>
        
                <p> Yesss on est bien</p>
                <p> Vous avez acces aux informations top secret éh éh ! <br></p>
                <p>CODE SECRET : CRD5-GTFT-CK65-JOPM-V29N-24G1-HH28-LLFV<br></p>
        
            <?php
        
            } 

    ?>

</div>


  
    <?php include('pieddepage.php');?>
     
 
</body>