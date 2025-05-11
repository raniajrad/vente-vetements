<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')


   <style type="text/css">
        .div_center
        {
            text-align: center;
            padding-top: 40px;
            font-weight: bold; /* Texte en gras */

        }
        .font_size
        {
            font-size: 40px;
            font-weight: bold; /* Texte en gras */
            padding-bottom: 40px;

        }
        .text_color
        {
            color: black;
            padding-bottom: 20px;
        }
        label
        {
            display: inline-block;
            width: 200px;
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
                <div class="div_center">

                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            {{ session('message') }}
                        </div>
                    @endif



                    <h1 class="font_size">Ajouter des images</h1>
                    <form action="{{ url('/ajout_image') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label>  Image:</label>
                        <input class="text_color"  type="file" name="image" required="" placeholder=" image">
                        <br><br>
                    </div>
                    <div>
                        <label> Nom De Image:</label>
                        <input class="text_color"  type="text" name="title"  required="" placeholder="entre nom de image">
                        <br><br>
                    </div>
                    
                    <div>
                        <label> Description De Image:</label>
                        <input class="text_color"  type="text" name="description" required="" placeholder="Description de image">
                        <br><br>
                    </div>
                    <div>
                        <label> Prix De Image:</label>
                        <input class="text_color"  type="number" name="price" required="" placeholder="prix de image">
                        <br><br>
                    </div>
                    <div>
                        <label> Quantite De Image:</label>
                        <input class="text_color"  type="number" name="quantite" required="" placeholder="quantite de image">
                        <br><br>
                    </div>
                    <div>
                        <label> Catagorie De Image:</label>
                        <select class="text_color" name="catagory" required="">
                            <option value="" selected="">Selection Catagorie:</option>
                            @foreach($catagorie as $catagorie)
                            <option value="{{$catagorie->name}}">{{$catagorie->name}}</option>
                            
                            @endforeach
                        </select>
                        <br><br>
                    </div>
                    <div> 
                        <input type="submit" value="Ajouter un image" class="btn btn-primary" style=" padding: 10px; background-color: #fa7ca6; ">
                    </div>


                </form>
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