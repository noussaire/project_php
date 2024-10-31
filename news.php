
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

    <main class="container py-5">
        <div class="row mb-5">
            <div class="col-12">
                <div class="card news-card">
                    <div class="card-body">
                    <span class="badge bg-primary mb-2">À la Une</span>
                        <h1 class="card-title h3">La Coupe du Monde 2030 : Un Moment Historique pour le Maroc</h1>
                        <p class="card-text">

                        <header>
        <h5>Un Projet Ambitieux et Historique</h5>
        <h5>Un Mondial Inédit : Trois Pays, Un Rêve</h5>
    </header>
    
    <section>
        <p>La Coupe du Monde 2030 marque un tournant décisif dans l'histoire du football mondial. Pour la première fois, un pays africain, le Maroc, sera co-organisateur de l'événement sportif le plus suivi sur la planète, aux côtés de l'Espagne et du Portugal.</p>
    </section>
    
    <section>
        <h3>Les Chiffres Clés</h3>
        <ul>
            <li><strong>Pays co-organisateurs</strong> : Maroc, Espagne, Portugal</li>
            <li><strong>Nombre de stades</strong> : 16 (dont 6 au Maroc)</li>
            <li><strong>Période</strong> : Juin-Juillet 2030</li>
            <li><strong>Investissement estimé</strong> : 500 millions de dollars</li>
        </ul>
    </section>
    
    <section>
        <h3>Les Villes Marocaines Hôtes</h3>
        
        <h4>Casablanca : Le Coeur Footballistique</h4>
        <p>Le stade Mohammed V, fleuron du football marocain, sera entièrement rénové. Avec une capacité de 67 000 places, il accueillera des matchs décisifs de la compétition.</p>
        <ul>
            <li><strong>Capacité</strong> : 67 000 spectateurs</li>
            <li><strong>Coût de rénovation</strong> : 120 millions de dirhams</li>
            <li><strong>Particularité</strong> : Système de climatisation innovant</li>
        </ul>
        
        <h4>Rabat : Le Nouveau Stade National</h4>
        <p>Un stade ultramoderne de 45 000 places sera construit, symbole de l'ambition sportive du royaume.</p>
        <ul>
            <li><strong>Architecture</strong> : Inspirée de la culture marocaine</li>
            <li><strong>Normes</strong> : Écologiques de dernière génération</li>
            <li><strong>Investissement</strong> : 250 millions de dirhams</li>
        </ul>
        
        <h4>Tanger et Marrakech : Des Écrins pour le Football Mondial</h4>
        <p>Ces deux villes compléteront le dispositif marocain, offrant des infrastructures de classe internationale.</p>
    </section>
    
    <section>
        <h3>Impact Économique et Social</h3>
        
        <h4>Un Boost Économique Considérable</h4>
        <ul>
            <li>50 000 emplois temporaires</li>
            <li>1 milliard de dirhams de retombées touristiques</li>
            <li>Développement des infrastructures régionales</li>
        </ul>
        
        <h4>Diplomatie Sportive</h4>
        <p>Au-delà du sport, cet événement représente :</p>
        <ul>
            <li>Une vitrine internationale pour le Maroc</li>
            <li>Une opportunité de rayonnement culturel</li>
            <li>Un projet de diplomatie soft power</li>
        </ul>
    </section>
    
    <section>
        <h3>Défis et Préparation</h3>
        
        <h4>Logistique et Coordination</h4>
        <p>Les trois pays travaillent en étroite collaboration pour :</p>
        <ul>
            <li>Harmoniser les systèmes de transport</li>
            <li>Coordonner l'accueil des délégations</li>
            <li>Assurer la sécurité de l'événement</li>
        </ul>
        
        <h4>Préparation des Infrastructures</h4>
        <ul>
            <li>Rénovation de 6 stades</li>
            <li>Extension et modernisation des aéroports</li>
            <li>Création de zones d'accueil touristique</li>
        </ul>
    </section>
    
    <section>
        <h3>Témoignage</h3>
        <blockquote>
            "Cette Coupe du Monde, c'est plus qu'un événement sportif. C'est la reconnaissance du football africain et marocain sur la scène mondiale."
            <footer>- Achraf Hakimi, capitaine de l'équipe nationale</footer>
        </blockquote>
    </section>
    
    <section>
        <h3>Conclusion</h3>
        <p>La Coupe du Monde 2030 s'annonce comme un moment historique. Le Maroc ne sera pas seulement un pays hôte, mais un acteur central de cet événement planétaire.</p>
        <p><em>Restez informés, le mondial 2030 commence maintenant !</em></p>
    </section>
    
    <section>
        <h3>Informations Pratiques</h3>
        <ul>
            <li><strong>Billetterie</strong> : Ouverture en janvier 2029</li>
            <li><strong>Sites officiels</strong> :</li>
            <ul>
                <li><a href="https://www.fifa.com" target="_blank">FIFA</a></li>
                <li><a href="https://www.maroc2030.ma" target="_blank">Comité d'organisation marocain</a></li>
            </ul>
        </ul>
    </section>
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">31 octobre 2024</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>