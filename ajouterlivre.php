<?php
include 'enteteadmin.php';
include 'authentification.php';
if(isset($_POST["AjoutUtilisateur"]))
{
echo '<div class="row">
        <div class=col-1>
        </div>
        <div class=col-8>
            <form>
                <h2>Titre</h2>    
                <input type="text" name="titre">
                <br>
                <h2>Isbn13</h2>   
                <input type="text" name="isbn13">
                <br>
                <h2>Année de parution</h2> 
                <input type="text" name="anneeparution">
                <br>
                <h2>Résumé</h2>
                <textarea class="form-control" rows="5" name="resume"></textarea>
                <input type="submit" value="Ajouter" name="AjoutUtilisateur">            
                </form>
        </div>
    </div>'
}
else
{
    require_once('connexion.php');
    $select = $connexion->prepare("INSERT INTO livre (nolivre, noauteur, titre, isbn13, anneeparution, resume, dateajout, image) VALUES (NULL, NULL, :titre, :isbn13, :anneeparution, resume, NULL, NULL) ");
    $select->setFetchMode(PDO::FETCH_OBJ);
    $select->bindValue(":titre",$_POST["titre"]);    
    $select->bindValue(":isbn13",$_POST["isbn13"]);
    $select->bindValue(":anneeparution",$_POST["anneeparution"]);    
    $select->bindValue(":resume",$_POST["resume"]);
    $select->execute();
?>