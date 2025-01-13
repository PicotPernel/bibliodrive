<html>
    <body>
        <form method='POST'>
            <label>Numéro Auteur</label>
            <br>
            <br>   
            <input type="text" name="noAuteur">    
            <br>
            <br>
            <label>Nom Auteur</label>
            <br>
            <br>  
            <input type="text" name="nomAuteur">
            <br>
            <br>
            <label>Prénom Auteur</label>
            <br>
            <br>  
            <input type="text" name="prenomAuteur">
            <br>
            <br>
            <input type="submit" value="Ajouter" name="btnAjouter">
        </form>
    </body
</html>

<?php
    if(isset($_POST["btnAjouter"]))
    {  
        require_once('connexion.php');
        $select = $connexion->prepare("INSERT INTO auteur (noauteur, nom, prenom) VALUES (:numero, :nom, :prenom)");
        $select->setFetchMode(PDO::FETCH_OBJ);
        $select->bindValue(":numero",$_POST["noAuteur"]);
        $select->bindValue(":nom",$_POST["nomAuteur"]);    
        $select->bindValue(":prenom",$_POST["prenomAuteur"]);
        $select->execute();
    }
?>