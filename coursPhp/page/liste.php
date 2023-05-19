<!-- 
    1. créer une formulaire select ASC ou DESC
    2. Créer selec de choice 1 ou 4 colonnes 
    3. tri par année-->
<?php
var_dump($_POST);
# mettre valeur par défault avec if isset
if(!isset($_POST['tri'])) { $_POST['tri']="ASC"; } // se lit, si 
if(!isset($_POST['column'])){$_POST['column']="distance";}
if(!isset($_POST['filtryear'])){$_POST['filtryear']= date('Y');}
?>
<form method = "POST" action=""> 
    <select name="tri" id="choice">
        <option value="ASC" <?php if($_POST['tri'] == "ASC" ) echo "selected";?>>Croissant</option>
        <option value="DESC" <?php if($_POST['tri'] == "DESC" ) echo "selected";?>>Décroissant</option>
    </select>
    <select name="filtryear" id="">
        <option value="2022"<?php if($_POST['filtryear'] == "2022") echo "selected";?>></option>
        <option value="2021"<?php if($_POST['filtryear'] == "2021") echo "selected";?>></option>
        <option value="2020"<?php if($_POST['filtryear'] == "2020") echo "selected";?>></option>
    </select>

    <select name="column" id="choice">
        <option value="date_start"<?php if($_POST['column'] == "date_start" ) echo "selected";?>>date_start</option>
        <option value="duree"<?php if($_POST['column'] == "duree" ) echo "selected";?>>durée</option>
        <option value="distance"<?php if($_POST['column'] == "distance" ) echo "selected";?>>distance</option>
        <option value="denivele"<?php if($_POST['column'] == "denivele" ) echo "selected";?>>denivele</option>
        <option value="id_type_act"<?php if($_POST['column'] == "id_type_act" ) echo "selected";?>>id_type_act</option>
    </select>
        <input type="submit"  name="subliste" value="Valider" ><br/>
        <!-- <a href="add_from.php" target="_blank"><input type="submit"  name="new" value="Create" ></a><br/> -->



</form>
<?php
    // stocker une connection dans une variable -> connection à la database
    $bdd = new PDO('mysql:host=localhost;dbname=coursphp','root','');
    // requete
        $req ="SELECT * FROM `data` WHERE YEAR (`date_start`) = 
        '".$_POST['filtryear']."' ORDER BY  `".$_POST['column']."` ".$_POST['tri'] ;
    // lancer la requete et mettre le résultat dans le $res
        $res = $bdd->query($req);
        // Transformatoion de la requete en tableau
        $tbl = $res->fetchAll(); // le serveur de fichier qui fait le traitement (serveur client);

        // var_dump($tbl);
?>
        <a href="index.php?page=add_form" target ="_blanck" ><button>Nouveau</button></a><br/>
        <a href="index.php?page=add_form" target ="_blanck" ><input type="button" name = "add" value ="+"></a><br/>
<table>
        <?php
            // foreach c'est chaque ligne du tableau
            foreach ($tbl as $key => $value) {
             # code...
              echo   "<tr>
              
                        <td><a href='index.php?page=updt_form&id_act=".$value['id_data']."'>Modifier</a>
                        <a href='index.php?page=supp_form&id_act=".$value['id_data']."'>Supprimer</a>                        </td> 
                        <td>".$value['date_start']." </td> 
                        <td>".$value['duree']."</td> 
                        <td>".$value['distance']."</td> 
                        <td>".$value['denivele']."</td> 
                        <td>".$value['id_type_act']."</td> 
                        <td><a href='index.php?page=supp_form&id_act=".$value['id_data']."'>Supprimer</a></td> 

                    </tr>" ;
                            }  
   
        ?>
</table>

        