<!DOCTYPE html>
<html>
<head>
    <base href="/public">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Contact</title>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f8f5ee, rgb(238, 221, 227));
            color: #111;
        }

        .contact-container {
            max-width: 800px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .contact-form h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: 600;
            margin-bottom: 5px;
            display: block;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1.5px solid #ccc;
            border-radius: 8px;
            font-size: 15px;
        }

        .btn-submit {
            width: 100%;
            background-color: #dc3545;
            color: #fff;
            padding: 12px;
            border: 2px solid #dc3545;
            border-radius: 8px;
            font-size: 17px;
            font-weight: 600;
            transition: 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #b52b3a;
            border-color: #b52b3a;
        }

        .cpy_ {
            text-align: center;
            padding: 20px 0;
            background-color: transparent;
        }

        @media (max-width: 768px) {
            .contact-container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="hero_area">
        @include('home.header')

        <div class="container">
            <div class="contact-container">
                <div class="contact-form">
                    <h2>Contactez-nous</h2>
                    <form action="{{url('/post-message')}}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="name"><i class="fa fa-user"></i> Nom</label>
                            <input type="text" id="name" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="email"><i class="fa fa-envelope"></i> Email</label>
                            <input type="email" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="phone"><i class="fa fa-phone"></i> Téléphone</label>
                            <input type="text" id="phone" name="phone" required>
                        </div>

                        <div class="form-group">
                            <label for="username"><i class="fa fa-user-circle"></i> Nom d'utilisateur</label>
                            <input type="text" id="username" name="username" required>
                        </div>

                        <div class="form-group">
                            <label for="message"><i class="fa fa-comment"></i> Message</label>
                            <textarea id="message" name="message" rows="4" required></textarea>
                        </div>

                        <button type="submit" class="btn-submit">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>   

    <div class="cpy_">
        <p>© 2025 Tous droits réservés</p>
    </div>

    <script src="home/js/jquery-3.4.1.min.js"></script>
    <script src="home/js/popper.min.js"></script>
    <script src="home/js/bootstrap.js"></script>
    <script src="home/js/custom.js"></script>
</body>
</html>
