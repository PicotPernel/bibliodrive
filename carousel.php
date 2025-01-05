<div id="demo" class="carousel slide col-9" data-bs-ride="carousel">
</br>    
<h2 class="text-center text-success">Dernières acquisitions</h2>
</br>
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
  </div>
  <div class="carousel-inner">
<?php 
require_once('connexion.php');
$select = $connexion->prepare("SELECT * FROM livre order by dateajout asc limit 3");
$select->setFetchMode(PDO::FETCH_OBJ);
$select->execute();
$enregistrement = $select->fetch();
echo" <div class='carousel-item active d-flex justify-content-center'>
        <img src=./images/$enregistrement->image alt='$enregistrement->titre' class='d-block' style='width:30%'>
      </div>";

while($enregistrement = $select->fetch())
{
 echo " <div class='carousel-item d-flex justify-content-center'>
          <img src=./images/$enregistrement->image alt='$enregistrement->titre' class='d-block' style='width:30%'>
        </div>";
}
?>
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>