<!-- menu -->
<body>


<nav>
    <div class="element_menu">
     
    <?php if(isset($_SESSION['email'])){
            echo '<li><a href="page1.php">Kijo suis</a></li>';
    }
?>      <nav class="element_menu_nav nav">
           
            <a class="nav-link" href="index.php">Formulaires </a>
            <a class="nav-link"  href="bonjour.php?nom=Einstein&amp;prenom=Matheiuw">Bonjour </a>
            
            <a class="nav-link"  href="mysql.php?console=PC">mySql </a>
            <a class="nav-link"  href="compteur.php">Compteur </a>
            <a class="nav-link" href="nasa.php">TP1 EXERCICE NASA</a>
</nav>
    </div>
</nav>
