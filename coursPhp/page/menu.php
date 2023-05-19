<?php
    if(isset($_SESSION['nom']) && $_SESSION['nom'] != "") {?>Bonjour <?php echo $_SESSION['nom'];?>
    <br/><br/><?php }?>

<div class="menu">
        <ul>
            <li><a href="/index.php?page=accueil" >Accueil</a></li>
            <li><a href="/index.php?page=produits">Produit</a></li>
            <li><a href="/index.php?page=societe">Société</a></li>
            <li><a href="/index.php?page=contact">Contact</a></li>
            <?php
                if(!isset($_SESSION['nom'])||$_SESSION['nom'] == "") {
            ?>
            <li><a href="/index.php?page=identification">identification</a></li>
            <?php }  else {?>
            <li><a href="index.php?page=accueil&action=deco">Déconnection</a></li>
            <!-- Il faut se connecter pour avoir la liste -->
            <li><a href="index.php?page=liste">Liste</a></li>
            <?php } ?>
        </ul>
</div>
