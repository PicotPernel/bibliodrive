<?php
include 'entete.php';
include 'authentification.php';
?>

<div class="row">
<div class="col-1">
</div>
<div class="col-8">

<?php
$noLivre = $_GET["noLivre"];
require_once('connexion.php');
$select = $connexion->prepare("SELECT * FROM livre inner join auteur on (auteur.noauteur=livre.noauteur) where livre.nolivre = :NoLivre");
$select->setFetchMode(PDO::FETCH_OBJ);
$select->bindValue(":NoLivre",$_GET["noLivre"]);
$select->execute();
$enregistrement = $select->fetch();

echo "<p>Auteur : $enregistrement->nom $enregistrement->prenom</p>";
echo "<p>ISBN 13 : $enregistrement->isbn13</p>";
echo "<p>Resumé :</br> $enregistrement->resume</p>";

$select = $connexion->prepare("SELECT * FROM emprunter where nolivre = :NoLivre and dateretour IS NULL");
$select->setFetchMode(PDO::FETCH_OBJ);
$select->bindValue(":NoLivre",$_GET["noLivre"]);
$select->execute();
$enregistrement = $select->fetch();

if ($enregistrement)
{
    echo "Indisponible";
}
else
{
    echo "Disponible";
}

if (isset($_SESSION["nom"]))
{
    echo "</br></br><a href='./ajoutlivre.php?noLivre=$noLivre' class='btn btn-primary'>Emprunter (Ajout au panier)</a>";
}
else
{
    echo "</br></br>Il faut être connecté pour emprunter un livre";
}
?>
</div>
</div>
<?php
include 'pied_de_page.html';
?>