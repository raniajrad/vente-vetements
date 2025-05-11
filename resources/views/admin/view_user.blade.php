<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
             .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .center {
            margin: auto;
            width: 80%;
            text-align: center; /* Centrer le texte dans toute la table */
            margin-top: 30px;
            border: 2px solid rgb(236, 122, 198);
            background-color: rgb(252, 212, 212); /* Arrière-plan blanc */
            border-collapse: collapse; /* Fusion des bordures */
        }

        .center th, .center td {
            border: 1px solid #0e0d0d; /* Bordure des cellules */
            padding: 10px; /* Espacement intérieur */
            text-align: center; /* Centrer le texte */
            color: rgb(10, 10, 10); /* Texte noir */
        }

        .center th {
            background-color: rgb(5, 5, 5); /* Couleur de l'en-tête */
            
            font-weight: bold;
        }
        .font_size
        {
            font-size: 40px;
            font-weight: bold; /* Texte en gras */
            padding-bottom: 40px;

        }
        .th_color
        {
          background: rgb(247, 241, 233);
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
      <!-- partial -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

                            {{ session('message') }}
                        </div>
                    @endif
                <div class="div_center">
                    <h1 class="font_size"> Listes Des Utilisateurs</h1>
                    <table class="center">
                        <tr class="th_color">
                            <td>Nom des Utilisateurs</td>
                            <td>E-mail des Utilisateurs</td>
                            <td>Numero de telephone des Utilisateurs</td>
                            <td>Action</td>
                        </tr>
                        @foreach($data as $data)
                        <tr>
                            <td>{{$data->name}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->phone}}</td>
                            <td>
                                <a onclick="return confirm ('vous etre sur de supprimer cette utilisateur')" class="btn btn-danger" href="{{url('delete_user',$data->id)}}">Supprimer</a>
                            </td>

                        </tr>
                        @endforeach
                    </table>  
                </div>
            </div> 
           
        </div>  
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <script src="admin/assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="admin/assets/js/off-canvas.js"></script>
    <script src="admin/assets/js/hoverable-collapse.js"></script>
    <script src="admin/assets/js/misc.js"></script>
    <script src="admin/assets/js/settings.js"></script>
    <script src="admin/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="admin/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
  </body>
</html>