<?php
include 'entete.php';
include 'authentification.php';
?>
<div class="row">
<div class="col-1">
</div>
<div class="col-8">
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
</div>
</div>
<?php
include 'pied_de_page.html';
?>