<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>  
    <div class=row>    
        <div class=col-1>
        </div>
        <div class="col-8">    
            <nav class="navbar navbar-expand-sm bg-dark">
                <div class="container-fluid">
                    <form class="d-flex" method="get" action="liste.php">    
                            <input class="form-control" size=65 type="text" name="nomAuteur" placeholder="Rechercher dans le catalogue (saisie du nom de l'auteur)">                            
                        <button class="btn btn-secondary" type="submit">Rechercher</button>
                    </form>
                    <ul>
                        <li class="nav-item">      
                            <a class="btn btn-secondary" href="./ajouterutilisateur.php" size=55>
                                Ajouter utilisateur
                            </a>
                            <a class="btn btn-secondary" href="./ajouterlivre.php" size=55>
                                Ajouter livre
                            </a>   
                            <a class="btn btn-secondary" href="./accueil.php" size=55>
                                Accueil
                            </a> 
                            <a class="btn btn-secondary" href="./panier.php" size=55>
                                Panier
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>