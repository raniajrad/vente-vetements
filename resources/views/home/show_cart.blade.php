<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title> Vente de Vêtements</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="home/css/bootstrap.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <!-- Custom styles -->
    <link href="home/css/style.css" rel="stylesheet" />
    <link href="home/css/responsive.css" rel="stylesheet" />

    <style>
        body {
            background-color: white;
            font-family: 'Arial', sans-serif;
        }

        .table-container {
            margin: 60px auto;
            width: 90%;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
        }

        .table th, .table td {
            padding: 15px;
            text-align: center;
            border: none;
        }

        .table th {
            background-color: #f54141;
            color: white;
            font-size: 1.2rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .table td {
            background-color: #f9f9f9;
            color: #555;
            font-size: 1rem;
        }

        .table img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 10px;
        }

        .action-btn {
            color: rgb(17, 15, 15);
            
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.3s;
            font-size: 1rem;
        }

        .action-btn:hover {
            background-color: #f54141;
            transform: translateY(-2px);
        }

        .total_deg {
            font-size: 1.5rem;
            font-weight: bold;
            color: #28a745;
            padding: 30px;
            text-align: right;
        }

        .payment-btns {
            margin-top: 30px;
            text-align: center;
        }

        .payment-btns a {
            margin: 10px;
            font-size: 16px;
            padding: 12px 30px;
            color: white;
            background-color: #f54141;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.3s;
        }

        .payment-btns a:hover {
            background-color: #00b351;
            transform: translateY(-2px);
        }

        /* Confirmation button */
        .confirm-btn {
            font-size: 1rem;
            padding: 10px 20px;
            background-color: #f54141;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s;
        }

        .confirm-btn:hover {
            background-color: #f54141;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .table-container {
                padding: 15px;
            }

            .table th, .table td {
                font-size: 0.9rem;
            }

            .payment-btns a {
                font-size: 0.9rem;
                padding: 10px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="hero_area">
        @include('home.header')

        @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session()->get('message') }}
            </div>
        @endif

        <div class="table-container">
            <h2 class="text-center">Votre Panier</h2>

            <table class="table">
                <thead>
                    <tr>
                        <th>Nom de l'image</th>
                        <th>Quantité</th>
                        <th>Prix</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  <?php $totalprice = 0; ?>
                  @foreach($cart as $item)
                      <tr>
                          <td>{{ $item->image_title }}</td>
                          <td>{{ $item->quantite }}</td>
                          <td>{{ $item->price }} DT</td>
                          <td><img src="/image/{{$item->image}}" alt="Image"></td>
                          <td>
                              <a href="{{ url('/remove_cart', $item->id) }}" onclick="return confirmDelete()" class="action-btn">
                                  <i class="fas fa-trash-alt"></i> 
                              </a>
                          </td>
                      </tr>
                      <?php 
                          $totalprice += ($item->price * $item->quantite); // Calcul du total pour cet item
                      ?>
                  @endforeach
              </tbody>
              </table>
              
              <div class="total_deg">
                  <h2>Total: {{ $totalprice }} DT</h2>
              </div>
              

            <div class="payment-btns">
                <h2>Passer une commande</h2>
                <a href="{{ url('stripe',$totalprice) }}" class="btn btn-danger">Payer par carte</a>
                
            </div>
        </div>

        <div class="cpy_">
            <p class="mx-auto">© 2025 Tous droits réservés</p>
        </div>

        <script>
            function confirmDelete() {
                return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');
            }
        </script>

        <!-- Bootstrap JS and Custom JS -->
        <script src="home/js/jquery-3.4.1.min.js"></script>
        <script src="home/js/popper.min.js"></script>
        <script src="home/js/bootstrap.js"></script>
        <script src="home/js/custom.js"></script>
    </body>
</html>
