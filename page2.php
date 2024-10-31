<?php   
    session_start();
if (isset($_POST["logout"]))
{
    session_destroy();
    header("Location: loging.php");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualités du Jour</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
          .A {
            background-color: #f0f4f7;
            padding: 2rem 1rem;
            text-align: center;
        }
        .news-card {
            transition: transform 0.2s;
        }
        .news-card:hover {
            transform: translateY(-5px);
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>
<?php include "navbar.php"; ?>

    <header class="bg-light py-5">
    <h4 class="display-7"><u>Hello,<?php echo($_SESSION["name"]); ?> !</u></h4>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="display-4">Les Dernières Actualités</h1>
                    <p class="lead">Restez informé des dernières nouvelles en MAROC et dans le monde</p>
                </div>
            </div>
        </div>
    </header>

    <main class="container py-5">
        <div class="row mb-5">
            <div class="col-12">
                <div class="card news-card">
                    <img src="https://prod.cdn-medias.jeuneafrique.com/cdn-cgi/image/q=auto,f=auto,metadata=none,width=1215,fit=cover,gravity=0.5153x0.4775/https://prod.cdn-medias.jeuneafrique.com/medias/2024/04/19/jad20240419-mmo-maroc-foot.jpg" class="card-img-top" alt="Actualité principale"  style="height: 400px; object-fit: cover;" >
                    <div class="card-body">
                        <span class="badge bg-primary mb-2">À la Une</span>
                        <h2 class="card-title h3">La Coupe du Monde 2030 : Un Moment Historique pour le Maroc</h2>
                        <p class="card-text">La Coupe du Monde 2030 marque un tournant décisif dans l'histoire du football mondial. Pour la première fois, un pays africain, le Maroc...</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">31 octobre 2024</small>
                           <a href="news.php" class="btn btn-primary">Lire plus</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>