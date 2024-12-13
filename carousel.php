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
echo "<div class='carousel-item active'>
        <img src=./images/$enregistrement->image alt='$enregistrement->titre' class='d-block' style='width:100%'>
      </div>";

while($enregistrement = $select->fetch())
{
 echo "<div class='carousel-item'>
          <img src=./images/$enregistrement->image alt='$enregistrement->titre' class='d-block' style='width:100%'>
        </div>";
}
?>
</div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>