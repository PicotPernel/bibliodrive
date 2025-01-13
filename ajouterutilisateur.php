<?php
include 'enteteadmin.php';
include 'authentification.php';
?>
<div class="row">
    <div class=col-1>
    </div>
    <div class=col-8>
        <form>
            <h2>Email</h2>    
            <input type="text" name="mél">
            <br>
            <h2>Mot de passe</h2>   
            <input type="text" name="motdepasse">
            <br>
            <h2>Nom</h2> 
            <input type="text" name="nom">
            <br>
            <h2>Prénom</h2>    
            <input type="text" name="prénom">
            <br>
            <h2>Adresse</h2>   
            <input type="text" name="adresse">
            <br>
            <h2>Ville</h2> 
            <input type="text" name="ville">
            <br>
            <h2>Code postal</h2>    
            <input type="text" name="codepostal">
            <br>
            <input type="submit" value="Ajouter" name="AjoutUtilisateur">
        </form>
    </div>
</div>