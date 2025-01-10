<div class=row>    
  <div class=col-1>
  </div>
  <div class="col-8">
    <div id="demo" class="carousel slide bg-dark" data-bs-ride="carousel"> 
    <h2 class="text-center text-white">Dernières acquisitions</h2>
    <p> </p>
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
echo" <div class='carousel-item active'>
      <div class='text-center'>
        <img src=./images/$enregistrement->image alt='$enregistrement->titre' class='mx-auto d-block' width=325px height=500px>
      </div>
      </div>";
while($enregistrement = $select->fetch())  
{
 echo " <div class='carousel-item'>
        <div class='text-center'>         
          <img src=./images/$enregistrement->image alt='$enregistrement->titre' class='mx-auto d-block' width=325px height=500px>
        </div>
        </div>";
}
?>
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>
</div>
