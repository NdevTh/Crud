
<form action="" method="post">
    Duré : <input type ="texte" name="duree"></br>
    distance : <input type ="texte" name="distance"></br>
    denivele : <input type ="texte" name="denivele"></br>
    <input type="submit" name="creat" value ="enregistrer">
</form>


<?php
    //verification que ca focntion, on stock que sur la machine les variables
 

    // pour afficher les saisis, les variables sont tjs sur ma machine
    // echo($_POST['duree']);
    // echo($_POST['distance']);
    // echo($_POST['denivele']);

    // on va envoyer les données
    if (isset($_POST['creat'])){
        // connection BDD
        $bdd = new PDO('mysql:host=localhost;dbname=coursphp','root','');
        // requetp
        //Pour vérifier on utilise l'echo, puis on copie la requet qui se trouve dans l'index et puis on les reproduits sur phpmyadmin onglet sql
        //echo $req = "INSERT INTO `data`(`duree`,`distance`,`denivele`,`id_licencie`,`id_type_act`,`date_start`)
        $req = "INSERT INTO `data`(`duree`,`distance`,`denivele`,`id_licencie`,`id_type_act`,`date_start`) 
        VALUES (".$_POST['duree'].",".$_POST['distance'].",".$_POST['denivele'].",'2','4','".date('Y-m-d H:i:s')."')";
        $bdd ->query($req);
    
        var_dump($_POST['duree']);
        $duree = $_POST['duree'];
        $distance = $_POST['distance'];
        $denivele = $_POST['denivele'];
    }
?>