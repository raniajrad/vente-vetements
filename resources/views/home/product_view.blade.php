   

<style>
/* Product Section */
.product_section {
    padding: 80px 0;
    background-color: #f9f9f9; /* Light background to highlight products */
}

.heading_container h2 {
    font-size: 2rem;
    font-weight: 700;
    color: #333;
    margin-bottom: 40px;
}

.heading_container span {
    color: #007bff;
    text-decoration: underline;
}

/* Box styling */
.box {
    transition: transform 0.3s, box-shadow 0.3s;
    border-radius: 10px; /* Rounded corners for the box */
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Soft shadow for depth */
    overflow: hidden;
    margin-bottom: 30px; /* Add space between boxes */
}

.box:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15); /* Slightly more shadow on hover */
}

/* Image Box */
.img-box {
    position: relative;
    overflow: hidden;
    border-radius: 10px 10px 0 0;
}

.img-box img {
    width: 100%;
    height: 250px; /* Adjust image height */
    object-fit: cover;
    transition: transform 0.3s ease-in-out;
}

.img-box:hover img {
    transform: scale(1.1); /* Zoom effect on hover */
}

/* Detail Box */
.detail-box {
    padding: 20px;
    text-align: center;
    background-color: #fff;
}

.detail-box h5 {
    font-size: 1.3rem;
    font-weight: 600;
    color: #333;
    margin-bottom: 10px;
}

.detail-box h6 {
    font-size: 1.1rem;
    color: #28a745;
    margin-top: 5px;
    font-weight: bold;
}

/* Button and Input Styles */
.option_container {
    margin-top: 20px;
}

.option1, .option2 {
    padding: 12px;
    border-radius: 5px;
    width: 100%;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s ease;
}

.option1 {
    background-color: #007bff;
    color: white;
    font-weight: 500;
}

.option1:hover {
    background-color: #0056b3;
}

.option2 {
    border: 1px solid #007bff;
    color: #007bff;
    font-weight: 500;
}

.option2:hover {
    background-color: #e7f1ff;
}

/* Search Bar Styles */
.form-control {
    border-radius: 30px; /* Rounded edges for the search bar */
    padding: 10px 20px;
    font-size: 1rem;
    border: 2px solid #007bff;
    background-color: #fff;
    transition: border-color 0.3s ease;
}

.form-control:focus {
    border-color: #28a745;
    box-shadow: 0 0 5px rgba(40, 167, 69, 0.5);
}

.form-control::placeholder {
    color: #007bff;
}

/* Pagination Styling */
.pagination-container {
    margin-top: 40px;
}

.pagination-container .page-item {
    margin: 0 5px;
}

.pagination-container .page-link {
    border-radius: 30px;
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    transition: background-color 0.3s ease;
}

.pagination-container .page-link:hover {
    background-color: #0056b3;
}

/* Responsiveness */
@media (max-width: 768px) {
    .product_section {
        padding: 40px 0;
    }

    .box {
        margin-bottom: 20px;
    }

    .option1, .option2 {
        font-size: 0.9rem; /* Slightly smaller text on smaller screens */
    }
}

 </style>


<section class="product_section layout_padding">
   
   
   <div class="container">
       
             <!-- Affichage du message d'erreur -->
            @if(session('error'))
            <div class="alert alert-warning text-center">
                {{ session('error') }}
            </div>
            @endif
           <div style="width:500px; text-align: center;  display: block; margin: 50px auto;"> 
            <form action="{{url('search_product')}}" method="GET">
              @csrf
    
              <input style="width:500px; text-align: center;  display: block; margin: 50px auto;" type="text" style="color: #0e0d0d;" name="search" placeholder=" barre de rechercher... ">
              <input type="submit" value="search" class="btn btn-outline-primary">
    
            </form>
          </div>
          
       </div>
       <!-- Affichage des résultats de recherche -->
    @if(isset($image) && !$image->isEmpty())
       <div class="row">
           @foreach($image as $images)
           <div class="col-sm-6 col-md-4 col-lg-4 mb-4">
               <div class="box shadow-sm rounded">
                   <div class="img-box">
                       <img src="image/{{$images->image}}" alt="" class="img-fluid rounded-top">
                   </div>
                   <div class="detail-box p-3">
                       <h5 class="font-weight-bold">
                           {{$images->title}}
                       </h5>
                       <h6 class="text-success">
                           {{$images->price}} DT
                       </h6>
                       <div class="option_container mt-3">
                           <div class="options">
                               <a href="{{url('image_detaile',$images->id)}}" class="option1 btn btn-primary btn-block">
                                   Description 
                               </a>
                              <form action="{{url('add_cart',$images->id)}}" method="Post">
                                    @csrf
                                 <input type="number" name="quantite" value="1" min="1" style="width: 100px">
                                 <input type="submit" value="Ajouter  dans panier" class="option2 btn btn-outline-secondary btn-block">
                                       
                                 
                              </form>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           
        
           @endforeach
       </div>
       <div class="d-flex justify-content-center mt-3">
        {!! $image->links('pagination::bootstrap-4') !!}
       </div>
    @endif
        
   </div>
</section>
