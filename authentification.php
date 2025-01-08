<?php
if(!isset($_SESSION))
{
    session_start();
}
if(!isset($_SESSION["nom"]))
{   
    if(!isset($_POST["btnConnecter"]))
    {
        echo
        '<div class="row">
        <div class=col-1>
        </div>    
        <div class="col-8">
        </div>
        <div class=col-3>
        <h5 class="text-center">Se connecter</h5>
        <div class="d-flex justify-content-center">
        <form action="./accueil.php" method="post">
        <label for="ID">Identifiant</label><br>
        <input type="text" id="ID" name="ID"><br>
        <label for="lname">Mot de passe</label><br>
        <input type="text" id="MDP" name="MDP"><br><br>
        <input type="submit" value="Se connecter" name="btnConnecter">
        </br>
        <a href=./accueiladmin.php class="text-center" size=55>Cliquez ici pour se connecter en admin</a>
        </form>
        </div>
        </div>
        </div> 
        </div>';
    }
    else
    {
        require_once('connexion.php');
        $select = $connexion->prepare("SELECT * FROM utilisateur where mel=:mel and motdepasse=:mdp");
        $select->setFetchMode(PDO::FETCH_OBJ);
        $select->bindValue(":mel",$_POST["ID"]);    
        $select->bindValue(":mdp",$_POST["MDP"]);
        $select->execute();
        $enregistrement = $select->fetch();
        if ($enregistrement)
        {
            $_SESSION["nom"]=$enregistrement->nom;
            $_SESSION["prenom"]=$enregistrement->prenom;
            $_SESSION["adresse"]=$enregistrement->adresse;
            $_SESSION["ville"]=$enregistrement->ville;
            $_SESSION["codepostal"]=$enregistrement->codepostal;
            echo '<div class="row">
            <div class=col-1>
            </div>    
            <div class="col-8">
            </div>
            <div class=col-3>';
            echo '<h4 class="text-center">Bonjour </h4></br><h3 class="text-center">'.$_SESSION["nom"].' '.$_SESSION['prenom'].'</h3>';
            echo '<div>
            </br>
            <form action="./accueil.php" method="post">
            <input type="submit" value="Déconnexion" name="btnDéconnecter">
            </form>
            </div>';
            echo '</div> </div>';
        }
        else
        {
        echo
        '<div class="row">
        <div class=col-1>
        </div>
        <div class="col-8">
        </div>
        <div class=col-3>
        <h5 class="text-center">Se connecter</h5>
        <div class="d-flex justify-content-center">
        <h6 class="text-center">Identifiant ou mot de passe incorrect</h6>
        <form action="./accueil.php" method="post">
        <label for="ID">Identifiant</label><br>
        <input type="text" id="ID" name="ID"><br>
        <label for="lname">Mot de passe</label><br>
        <input type="text" id="MDP" name="MDP"><br><br>
        <input type="submit" value="Se connecter" name="btnConnecter">
        </br>
        <a href=./accueiladmin.php class="text-center" size=55>Cliquez ici pour se connecter en admin</a>
        </form>
        </div>
        </div>
        </div> 
        </div>';
        }
    }
}
else
{
    require_once('connexion.php');
    echo '<div class="row">
    <div class=col-1>
    </div>    
    <div class="col-8">
    </div>
    <div class=col-3>';
    echo '<h4 class="text-center">Bonjour </h4></br><h3 class="text-center">'.$_SESSION["nom"].' '.$_SESSION['prenom'].'</h3>
    <div>
    </br>
    <div class="d-flex justify-content-center">
    <form action="./accueil.php" method="post">
    <input type="submit" value="Déconnexion" name="btnDéconnecter">
    </form>
    </div> </div>
    </div> </div>';
}
if(isset($_POST["btnDéconnecter"]))
{
    session_destroy();
    header('Refresh:0;');
}
?>