<?php include 'entete.php' ;?>
<?php
require_once('connexion.php');
$select = $connexion->prepare("SELECT * FROM livre inner join auteur on (auteur.noauteur=livre.noauteur) where auteur.nom = :Nom");
$select->setFetchMode(PDO::FETCH_OBJ);
$select->bindValue(":Nom",$_GET["nomAuteur"]);
$select->execute();
while($enregistrement = $select->fetch())
{
 echo "<a href=./details.php?noLivre=1><p>$enregistrement->titre</p></a>";
}
?>
<?php include 'pied_de_page.html';?>