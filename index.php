<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MarocLib - Accueil</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header class="bg-primary text-white py-3">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="mb-0">MarocLib</h1>
                <nav>
                    <?php if (!isset($_SESSION['user_id'])): ?>
                        <a href="login.php" class="btn btn-light me-2">Se connecter</a>
                        <a href="inscription.php" class="btn btn-outline-light">S'inscrire</a>
                    <?php else: ?>
                        <a href="espace_perso.php" class="btn btn-light me-2">Espace Personnel</a>
                        <a href="logout.php" class="btn btn-outline-light">Se déconnecter</a>
                    <?php endif; ?>
                </nav>
            </div>
        </div>
    </header>

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