<!-- <?php
    if (isset($_POST['subbtn'])){       
    echo $_POST['idnom'];
}
?> -->

<br>
<form method="POST" action="">
    Nom : <input type="text" name="login" value="" >
     <br/>
     <!-- Nouveau mot de passe : <input type= "password" name ="mdp"> -->
     <br/>
     <br/>
     Confirmer mdp: <input type= "password" name ="cmdp" value="valider">
     <br/>
     <input type="submit"  name="subbtn" value="Valider" ><br/>

</form>