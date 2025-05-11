<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Application de vente de vêtements">
    <meta name="author" content="Votre Nom">
    <title>À propos | Vente de Vêtements</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="home/css/style.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fff;
            color: #333;
        }

        .section-title {
            font-size: 2rem;
            color: #d9534f;
            font-weight: bold;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .about-section, .team-section, .contact-section {
            padding: 3rem 2rem;
            background: #fff3e0;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }

        .about-section p {
            font-size: 1.1rem;
            line-height: 1.6;
        }

        .team-member {
            margin-bottom: 20px;
        }

        .team-member i {
            font-size: 2rem;
            color: #f39c12;
            margin-bottom: 10px;
        }

        .team-member p {
            font-weight: 500;
            color: #333;
        }

        .contact-section a {
            display: inline-block;
            padding: 12px 30px;
            background-color: #f39c12;
            color: white;
            font-weight: 600;
            border-radius: 5px;
            transition: background 0.3s;
            text-decoration: none;
        }

        .contact-section a:hover {
            background-color: #d9534f;
        }

        .icon {
            font-size: 1.5rem;
            margin-right: 10px;
            color: #d9534f;
        }
    </style>
</head>
<body>
    <div class="hero_area">
        @include('home.header')

        <div class="container">

            <section class="about-section text-center">
                <h3 class="section-title"><i class="fas fa-info-circle icon"></i> À propos</h3>
                <p>Bienvenue sur notre boutique en ligne dédiée à la mode. Nous proposons une large sélection de vêtements de qualité, tendance et accessibles. Notre mission est de rendre le shopping en ligne agréable, rapide et sécurisé pour tous nos clients.</p>
            </section>

            <section class="team-section text-center">
                <h3 class="section-title"><i class="fas fa-users icon"></i> Notre équipe</h3>
                <div class="row justify-content-center">
                    <div class="col-md-4 team-member">
                        <i class="fas fa-user-tie"></i>
                        <p>Fondateur & CEO</p>
                    </div>
                    <div class="col-md-4 team-member">
                        <i class="fas fa-bullhorn"></i>
                        <p>Responsable Marketing</p>
                    </div>
                    <div class="col-md-4 team-member">
                        <i class="fas fa-laptop-code"></i>
                        <p>Développeur Principal</p>
                    </div>
                </div>
            </section>

            <section class="contact-section text-center">
                <h3 class="section-title"><i class="fas fa-envelope icon"></i> Contactez-nous</h3>
                <p>Pour toute question, suggestion ou demande, contactez-nous !</p>
                <a href="mailto:contact@votreapplication.com"><i class="fas fa-paper-plane"></i> Envoyer un e-mail</a>
            </section>

        </div>

        @include('home.footer')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
