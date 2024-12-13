<?php include 'entete.php' ;?>
<?php
require_once('connexion.php');
$select = $connexion->prepare("SELECT * FROM livre inner join auteur on (auteur.noauteur=livre.noauteur) where auteur.nom = :Nom");
$select->setFetchMode(PDO::FETCH_OBJ);
$select->bindValue(":Nom",$_POST["entete"]);
$select->execute();
while($enregistrement = $select->fetch())
{
 echo "<p>$enregistrement->titre</p>";
}
?>
<?php include 'pied_de_page.html';?>