<!DOCTYPE html>
<html lang="en">
<head>
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
 <title> Vente de Vêtements</title>
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

      <div class="container mt-5">
         <div class="row">
            <div class="col-md-6">
               <!-- Image with Zoom effect -->
               <div class="img-box">
                  <img src="image/{{$image->image}}" alt="Product Image" class="img-fluid rounded zoom-effect">
               </div>
            </div>
            <div class="col-md-6">
               <div class="detail-box p-3">
                  <h2 class="font-weight-bold">{{$image->title}}</h2>
                  <h4 class="text-success">{{$image->price}} DT</h4>
                  <h6 class="text-muted">Catégorie: {{$image->catagory}}</h6>
                  <p class="mt-3">{{$image->description}}</p>
                  
                  <form action="{{url('add_cart',$image->id)}}" method="POST">
                     @csrf
                     <div class="form-group">
                        <label for="quantite" class="form-label">Quantité:</label>
                        <input type="number" name="quantite" value="1" min="1" id="quantite" class="form-control custom-input" />
                    </div>
                    
                     <div class="button-container mt-3">
                        <input type="submit" value="Ajouter au panier" class="flat-btn btn-block">
                     </div>
                  </form>
               </div>
            </div>
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
