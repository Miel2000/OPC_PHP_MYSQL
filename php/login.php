<?php session_start();?>
<?php include('entete.php');?>
<?php include('menu.php');?>
<?php include('pdo_connection.php');?>


<div class="login_container">

<p>Entrez votre login et votre mot de passe</p>

<form method="post" action="login_post.php">
    <p>
        Login : <input type="text" name="login"><br />
        Mot de passe : <input type="password" name="pass"><br /><br />
        <input type="submit" value="S'inscrire!">
    </p>
</form>



</div>