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
        <div class="text-center">
        <form action="./accueil.php" method="post">
        <label for="ID">Identifiant</label><br>
        <input type="email" id="ID" name="ID"><br>
        <label for="lname">Mot de passe</label><br>
        <input type="password" id="MDP" name="MDP"><br><br>
        <input type="submit" value="Se connecter" name="btnConnecter">
        </form>
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
        $_SESSION["nom"]=$enregistrement->nom;
        $_SESSION["prenom"]=$enregistrement->prenom;
        $_SESSION["adresse"]=$enregistrement->adresse;
        $_SESSION["ville"]=$enregistrement->ville;
        $_SESSION["codepostal"]=$enregistrement->codepostal;
        $_SESSION["profil"]=$enregistrement->profil;
        if($_SESSION["profil"]=="utilisateur")
        {
            if ($enregistrement)
            {    

                echo '<div class="row">
                <div class=col-1>
                </div>    
                <div class="col-8">
                </div>
                <div class=col-3>
                <h4 class="text-center">Bonjour </h4></br><h3 class="text-center">'.$_SESSION["nom"].' '.$_SESSION['prenom'].'</h3>
                </br>
                <h3 class="text-center">'.$_SESSION["adresse"].'</h3>
                </br>
                <h3 class="text-center">'.$_SESSION["codepostal"].' '.$_SESSION["ville"].'</h3>
                </br>
                <form action="./accueil.php" method="post">
                <div class=text-center>    
                    <input type="submit" value="Déconnexion" name="btnDéconnecter">
                </div>
                </form>
                </div> 
                </div> 
                </div>';
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
                <h6 class="text-center">Identifiant/Mot de passe incorrect</h6>
                <div class="text-center">
                <form action="./accueil.php" method="post">
                <label for="ID">Identifiant</label><br>
                <input type="email" id="ID" name="ID"><br>
                <label for="lname">Mot de passe</label><br>
                <input type="password" id="MDP" name="MDP"><br><br>
                <input type="submit" value="Se connecter" name="btnConnecter">
                </form>
                </div>
                </div>
                </div>';
            }
        }
        else
        {
            if($_SESSION["profil"]=="admin")
            {
                header('Refresh:0;url="accueiladmin.php";');
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
                <h6 class="text-center">Identifiant/Mot de passe incorrect</h6>
                <div class="text-center">
                <form action="./accueil.php" method="post">
                <label for="ID">Identifiant</label><br>
                <input type="email" id="ID" name="ID"><br>
                <label for="lname">Mot de passe</label><br>
                <input type="password" id="MDP" name="MDP"><br><br>
                <input type="submit" value="Se connecter" name="btnConnecter">
                </form>
                </div>
                </div>
                </div>';
            }
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
    <div class=col-3>
    <h4 class="text-center">Bonjour</h4></br><h3 class="text-center">'.$_SESSION["nom"].' '.$_SESSION["prenom"].'</h3>
    </br>
    <h3 class="text-center">'.$_SESSION["adresse"].'</h3>
    </br>
    <h3 class="text-center">'.$_SESSION["codepostal"].' '.$_SESSION["ville"].'</h3>
    <div>
    </br>
    <div class="text-center">
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