<?php
    $bdd = new PDO('mysql:host=localhost;dbname=coursphp','root','');

if(isset($_POST['subupdt'])){
//requete update
$req = "UPDATE `data`SET 
    `duree`='".$_POST['duree']."',
    `distance`='".$_POST['distance']."',
    `id_type_act`='".$_POST['id_type_act']."',
    `denivele`='".$_POST['denivele']."'WHERE `id_data`='".$_POST['id_act']."'";
    $bdd ->query($req);
    unset($_POST); // une fois tritées on détruit les informations du formulaire
    echo " les données ont été bien modifiées.<a href='index.php?page=liste'>Retour à la liste</a>";    
} // faire disparaitre la table avec Else
    // stocker une connection dans une variable -> connection à la database
    $bdd = new PDO('mysql:host=localhost;dbname=coursphp','root','');
    // requete
        $req ="SELECT * FROM `data` WHERE `id_data` = '".$_GET['id_act']."'";
    // lancer la requete et mettre le résultat dans le $res
        $res = $bdd->query($req);
        // Transformatoion de la requete en tableau
        $tbl = $res ->fetchAll(); // le serveur de fichier qui fait le traitement (serveur client);


?>

<form action="" method="post">
    <input type="hidden" name="id_act" value="<?php echo $_GET['id_act'];?>"><br/>
        Durée : <input type ="texte" name="duree" value ="<?php echo $tbl[0]['duree'];?>"></br>
        Distance : <input type ="texte" name="distance" value ="<?php echo $tbl[0]['distance'];?>"></br>
        Activity : <input type ="texte" name="id_type_act" value ="<?php echo $tbl[0]['id_type_act'];?>"></br>
        Dénivelé : <input type ="texte" name="denivele" value ="<?php echo $tbl[0]['denivele'];?>"></br>
    <input type="submit" name="subupdt" value ="Enregistrer">
</form>

