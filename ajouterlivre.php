<?php
include 'enteteadmin.php';
include 'authentification.php';
?>
<div class="row">
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
            <input type="text" name="anneparution">
            <br>
            <h2>Résumé</h2>
            <textarea class="form-control" rows="5" id="comment" name="resume"></textarea>
        </form>
    </div>
</div>