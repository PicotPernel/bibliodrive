<?php
require_once('connexion.php');
$select = $connexion->prepare("SELECT * FROM livre inner join auteur on (auteur.noauteur=livre.noauteur) where livre.nolivre = :NoLivre");
$select->setFetchMode(PDO::FETCH_OBJ);
$select->bindValue(":NoLivre",$_GET["noLivre"]);
$select->execute();
$enregistrement = $select->fetch();
echo "<p>Auteur : $enregistrement->nom $enregistrement->prenom</p>";
echo "<p>ISBN 13 : $enregistrement->isbn13</p>";
echo "<p>Resumé :</br> $enregistrement->resume</p>";
?>