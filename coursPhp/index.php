<!-- on teste si une variable existe avec if(!isset) -->
<?php
//  on créée la premiere session pour lancer
    session_start();
    if(isset($_GET['action'])){
        if($_GET['action'] =='deco'){
        session_destroy();
        unset($_SESSION['nom']);
        }
    }
    $idnom_valid = "moi";
    $mdp_valid ="lemien";

    if(isset($_POST['subbtn']) && isset($_POST['cmdp'])){
        // Vérifier en BDD si l'association login / mot de passe is correct in Database for create the session. els said problem.
        //if($idnom_valid == $_POST['idnom'] $$ $mdp_valid == $_POST['mdp']){
            // dans ce cas, tout et ok, on peut démarrer notre session
            // on la démarre
        //$_SESSION['idnom']= $_POST['idnom'];
       //$_SESSION['mdp']= $_POST['mdp'];


        // stocker une connection dans une variable
        $bdd = new PDO('mysql:host=localhost;dbname=coursphp','root','');
       // requete
        $req ="SELECT * FROM `user` WHERE `login` = '".$_POST['login']."' AND `passw` = '".$_POST['cmdp']."'";
        // lancer la requete et mettre le résultat dans le $res
        $res = $bdd->query($req);
        // Transformatoion de la requete en tableau
        $tbl = $res->fetchAll(); // le serveur de fichier qui fait le traitement (serveur client)

        if(count($tbl)> 0) {
            $_SESSION['nom'] = $tbl[0]['nom'];
        } else {
            echo "Une erreur est survenu, merci de recommencer";
        }

    }
/* -- */
    if(!isset($_GET['page'])) $_GET['page']="accueil"; // si la page existe pas on envoie au page par defaut
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>créer un connection avec formulaire</title>
    <link rel="stylesheet" href="/css/style.css">

</head>

<body>
<header>
    <?php include('page/menu.php');?>
</header>
<main>
    <?php
        if(file_exists('page/'.$_GET['page'].'.php')) {
            include('page/'.$_GET['page'].'.php');}
            else{
                include('page/erreur.php');
            }
     //var_dump($_GET);
   //echo $_GET['page'];
    ?>


</main>
<footer>
    <p> Tout droits réservés - 2022 - rue du dibon</p>
</footer>
</body>
</html>
