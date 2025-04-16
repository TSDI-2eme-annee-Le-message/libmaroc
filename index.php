<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MarocLib - Votre Bibliothèque en Ligne</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header class="bg-primary text-white py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="mb-0">MarocLib</h1>
            <nav class="d-flex align-items-center">
                <a href="#contact" class="btn btn-light me-3">Contactez-nous</a>
                <a href="https://www.instagram.com" class="text-white me-3"><i class="bi bi-instagram"></i></a>
                <a href="https://www.facebook.com" class="text-white me-3"><i class="bi bi-facebook"></i></a>
                <a href="https://wa.me/yourwhatsappnumber" class="text-white"><i class="bi bi-whatsapp"></i></a>
            </nav>
            <div>
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <a href="login.php" class="btn btn-sm btn-light me-2">Se connecter</a>
                    <a href="inscription.php" class="btn btn-sm btn-outline-light">S'inscrire</a>
                <?php else: ?>
                    <a href="espace_perso.php" class="btn btn-sm btn-light me-2">Espace Personnel</a>
                    <a href="logout.php" class="btn btn-sm btn-outline-light">Se déconnecter</a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <!-- Search Bar -->
    <section class="container my-4">
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Rechercher un livre..." aria-label="Search">
            <button class="btn btn-outline-primary" type="submit">Rechercher</button>
        </form>
    </section>

    <!-- Carrousel -->
    <section class="my-5">
        <div class="container">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a href="categorie_romans.php">
                            <img src="images/romans.jpg" alt="Romans" class="d-block w-100">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="categorie_sciences.php">
                            <img src="images/sciences.avif" alt="Sciences" class="d-block w-100">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="categorie_histoire.php">
                            <img src="images/une.jpg" alt="Histoire" class="d-block w-100">
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="categorie_art.php">
                            <img src="images/visite.jpg" alt="Art" class="d-block w-100">
                        </a>
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </section>

    <!-- Featured Books -->
    <section class="container my-5">
        <h2 class="text-center mb-4">Livres en Vedette</h2>
        <div class="row">
            <div class="col-md-3">
                <img src="images/zarathoustra.jpg" class="img-fluid" alt="Livre 1">
                <p class="text-center">Ainsi parlait zarathoustra</p>
            </div>
            <div class="col-md-3">
                <img src="images/Dante.jpeg" class="img-fluid" alt="Livre 2">
                <p class="text-center">La comédie divine</p>
            </div>
            <div class="col-md-3">
                <img src="images/ulysses-cover.jpg" class="img-fluid" alt="Livre 3">
                <p class="text-center">Ulysses</p>
            </div>
            <div class="col-md-3">
                <img src="images/100years.jpeg" class="img-fluid" alt="Livre 4">
                <p class="text-center">100 years of solitude</p>
            </div>
        </div>
    </section>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
</body>
</html>
