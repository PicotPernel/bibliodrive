<?php
include 'enteteadmin.php';
include 'authentification.php';

if (!isset($_POST["AjoutUtilisateur"]))
{
echo '<div class="row">
    <div class=col-1>
    </div>
    <div class=col-8>
        <form action="./ajouterutilisateur.php" method="post">
            <h2>Email</h2>    
            <input type="text" name="mel">
            <br>
            <h2>Mot de passe</h2>   
            <input type="text" name="motdepasse">
            <br>
            <h2>Nom</h2> 
            <input type="text" name="nom">
            <br>
            <h2>Prénom</h2>    
            <input type="text" name="prenom">
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
</div>';
}
else
{
    require_once('connexion.php');
    $select = $connexion->prepare("INSERT INTO utilisateur (mel, motdepasse, nom, prenom, adresse, ville, codepostal, profil) VALUES (:mel, :mdp, :nom, :prenom, :adresse, :ville, :cd, :utilisateur)");
    $select->setFetchMode(PDO::FETCH_OBJ);
    $select->bindValue(":mel",$_POST["mel"]);    
    $select->bindValue(":mdp",$_POST["motdepasse"]);
    $select->bindValue(":nom",$_POST["nom"]);    
    $select->bindValue(":prenom",$_POST["prenom"]);
    $select->bindValue(":adresse",$_POST["adresse"]);
    $select->bindValue(":ville",$_POST["ville"]);
    $select->bindValue(":cd",$_POST["codepostal"]);
    $select->bindValue(":utilisateur","utilisateur");
    $select->execute();
}