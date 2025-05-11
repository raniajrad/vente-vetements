<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

      <!-- Basic -->
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

      <style type="text/css">
        .center{
         margin: auto;
         width: 70%;
         text-align: center;
         padding: 50px;
 
        }
        table,th,td{
         border: 2px solid black;
 
 
        }
        .th_deg{
         font-size: 25px;
         padding: 5px;
         background: rgb(248, 162, 176);
        }
        .img_deg{
         height: 100px;
         width: 100px;
         
        }
        .total_deg
        {
          font-size: 25px;
          padding: 40px;
 
        }
 
 
        </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
            @include('home.header')
         <!-- end header section -->
       <div>
            <table class="center">
                <tr>
                    <th class="th_deg">Nom de image</th>
                    <th  class="th_deg">Quantite</th>
                    <th class="th_deg">Prix</th>
                    <th class="th_deg">Image</th>
                    <th class="th_deg">Annuler la commande</th>
                </tr>
                @foreach($order as $order)

                <tr>
                    <td>{{$order->image_title}}</td>
                    <td>{{$order->quantite}}</td>
                    <td>{{$order->price}}</td>
                    <td><img class="img_deg" src="/image/{{$order->image}}"></td>
                    <td><a  onclick="return Confirm('vous etre sur de annuler cette image ?')" class="fas fa-times" href="{{url('cancel_order',$order->id)}}"></a></td>
                </tr>

                @endforeach



            </table>






       </div>







      <!-- footer start -->
            @include('home.footer')  
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2025 Tous droits réservés <br>
         
            
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>