<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="col-9">
        <nav class="navbar navbar-expand-sm bg-dark">
            <div class="container-fluid">
                <form class="d-flex" method="get" action="liste.php">
                    <input class="form-control" size=65 type="text" name="nomAuteur" placeholder="Rechercher dans le catalogue (saisie du nom de l'auteur)">
                    <button class="btn btn-secondary" type="submit">Rechercher</button>
                </form>
                <ul>
                    <li class="nav-item">
                        <button class="btn btn-secondary" size=55>
                            Panier
                        </button>
                    </li>
                </ul>
            </div>
        </nav>
    </div>