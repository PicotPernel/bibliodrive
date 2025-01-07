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
$select = $connexion->prepare("SELECT * FROM livre inner join auteur on (auteur.noauteur=livre.noauteur) where auteur.nom = :Nom");
$select->setFetchMode(PDO::FETCH_OBJ);
$select->bindValue(":Nom",$_GET["nomAuteur"]);
$select->execute();
while($enregistrement = $select->fetch())
{
 echo "<a href=./details.php?noLivre=$enregistrement->nolivre><h3 class='text-center'>$enregistrement->titre ($enregistrement->anneeparution)</h3></a>";
}
include 'pied_de_page.html';
?>
    </div>
</div>