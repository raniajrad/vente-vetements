<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   <!-- Basic -->
   <base href="/public">
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <!-- Mobile Metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <!-- Site Metas -->
   <meta name="keywords" content="" />
   <meta name="description" content="" />
   <meta name="author" content="" />
   <link rel="shortcut icon" href="home/images/caa.jpg" type="">
   <title>portfolio| Vente de Vêtements</title>
   <!-- bootstrap core css -->
   <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
   <!-- font awesome style -->
   <link href="home/css/font-awesome.min.css" rel="stylesheet" />
   <!-- Custom styles for this template -->
   <link href="home/css/style.css" rel="stylesheet" />
   <!-- responsive style -->
   <link href="home/css/responsive.css" rel="stylesheet" />
   <!-- custom styles for the detail page -->
   <link href="home/css/detail-style.css" rel="stylesheet" />

   
   
</head>
<body>
   <div class="hero_area">
      <!-- header section starts -->
         @include('home.header')
      <!-- end header section -->

      <div class="container py-5">
        <h2 class="text-center fw-bold text-gradient mb-5">
            <span class="text-warning">✨</span> Nos Catégories <span class="text-danger">✨</span>
        </h2>
        <div class="row g-4">
            @foreach($categories as $categorie)
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-lg rounded-4 overflow-hidden"
                        style="background-color: 
                            {{ $categorie->name == 'EVENEMENTS' ? '#FFB6C1' :  /* Light Pink */
                            ($categorie->name == 'FESTIVALS' ? '#FFDDC1' :  /* Light Peach */
                            ($categorie->name == 'PARTIES' ? '#A8DADC' :  /* Light Blue */
                            ($categorie->name == 'ANIMALS' ? '#D4E157' :  /* Lime Green */
                            ($categorie->name == 'VOYAGES' ? '#FFD54F' :  /* Light Yellow */
                            ($categorie->name == 'FLAGS' ? '#FF7043' :  /* Light Blue */
                            ($categorie->name == 'CONCERTS' ? '#FF8A65' :  /* Light Blue */
                            '#8B4513')))))) }};">  <!-- Light maron -->
                        <div class="card-body text-center py-5">
                            <!-- Ajouter l'icône -->
                            <div class="display-4 text-white">
                                @if($categorie->name == 'EVENEMENTS')
                                    <i class="fas fa-calendar-alt"></i>
                                @elseif($categorie->name == 'FESTIVALS')
                                    <i class="fas fa-ring"></i>
                                @elseif($categorie->name == 'PARTIES')
                                    <i class="fa-glass-cheers"></i>
                                @elseif($categorie->name == 'ANIMALS')
                                    <i class="fas fa-paw"></i>    
                                @elseif($categorie->name == 'VOYAGES')
                                    <i class="fas fa-plane"></i>
                                @elseif($categorie->name == 'FLAGS')
                                    <i class="fas fa-flag"></i>
                                @elseif($categorie->name == 'CONCERTS')
                                    <i class="fas fa-microphone-alt"></i>    
                                @else
                                    <i class="fas fa-camera"></i>
                                @endif
                            </div>
                            <!-- Titre de la catégorie -->
                            <h5 class="card-title text-uppercase fw-bold text-white mt-3">{{ $categorie->name }}</h5>
                            <!-- Bouton Découvrir -->
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        
    </div>
    
      

      <!-- footer starts -->
         @include('home.footer')  
      <!-- footer ends -->
      <div class="cpy_">
         <p class="mx-auto">© 2025 Tous droits réservés <br></p>
      </div>

   </div>
   
   <!-- jQuery -->
   <script src="home/js/jquery-3.4.1.min.js"></script>
   <!-- Popper JS -->
   <script src="home/js/popper.min.js"></script>
   <!-- Bootstrap JS -->
   <script src="home/js/bootstrap.js"></script>
   <!-- Custom JS -->
   <script src="home/js/custom.js"></script>
</body>
</html>

