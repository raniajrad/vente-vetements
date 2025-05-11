<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique de Vêtements</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: white;
            color: #111111;
        }

        /* HERO SECTION */
        .hero {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 60px 20px;
            background: white
            color: #111010;
            border-radius: 15px;
        }

        .hero-text {
            flex: 1;
            padding-right: 20px;
        }

        .hero-text h1 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 20px;
            animation: fadeInLeft 1s ease-in-out;
        }

        .hero-text p {
            font-size: 1.2rem;
            margin-bottom: 20px;
            animation: fadeInLeft 1.2s ease-in-out;
        }

        .btn-custom {
            background: #2e2b1d;
            color: #e7ebe3;
            padding: 12px 25px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
            animation: fadeInLeft 1.4s ease-in-out;
        }

        .btn-custom:hover {
            background: #b8b890;
            color: white;
        }

        /* IMAGE À DROITE */
        .hero-image {
            flex: 1;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            padding-left: 20px;
        }

        .hero-image img {
            width: 100%;
            max-width: 500px;
            border-radius: 15px;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s;
        }

        .hero-image img:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(120, 120, 120, 0.4);
        }

        /* SERVICES / CATÉGORIES */
        .services {
            padding: 60px 20px;
            text-align: center;
            background: linear-gradient(135deg, #f8f5ee,rgb(252, 251, 246));
            color: #2e2e2e;
            border-radius: 15px;
            margin-top: 40px;
        }

        .services h2 {
            font-size: 2.5rem;
            margin-bottom: 30px;
        }

        .services .icon {
            font-size: 3rem;
            color: #2e2e2e;
            margin-bottom: 15px;
            transition: transform 0.3s;
        }

        .services .icon:hover {
            transform: scale(1.2);
            color: #b8b890;
        }

        /* ANIMATIONS */
        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .hero {
                flex-direction: column;
                text-align: center;
            }

            .hero-text {
                padding-right: 0;
            }

            .hero-image {
                padding-left: 0;
                margin-top: 20px;
            }
        }
    </style>
</head>
<body>

    <!-- HERO SECTION -->
    <header class="hero">
        <div class="hero-text">
            <h1>Bienvenue dans notre boutique</h1><dt>
            <p>Explorez notre collection de vêtements tendance pour tous les styles</p>
            <a href="#services" class="btn-custom">Découvrir</a>
        </div>
        <div class="hero-image">
            <img src="https://static.vecteezy.com/ti/vecteur-libre/p1/4986819-logo-boutique-de-vetements-femmes-modernes-vectoriel.jpg" alt="Vêtements tendance">
        </div>
    </header>

    <!-- CATÉGORIES SECTION -->
    <section class="services" id="services">
        <h2>Nos Catégories</h2>
        <div class="row justify-content-center">
            <div class="col-md-3">
                <i class="fas fa-tshirt icon"></i>
                <p>Hauts</p>
            </div>
            <div class="col-md-3">
                <i class="fas fa-user-friends icon"></i>
                <p>Femmes</p>
            </div>
            <div class="col-md-3">
                <i class="fas fa-male icon"></i>
                <p>Hommes</p>
            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
