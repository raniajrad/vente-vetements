<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Gestion de l'authentification
use App\Models\User; // Modèle User pour gérer les utilisateurs
use App\Models\Image; // Modèle Image pour gérer les images
use App\Models\Cart; // Modèle Cart pour gérer  le panier d'achats
use App\Models\Order; // Modèle Order pour gérer les commandes
use App\Models\catagorie; // Modèle Produit pour gérer les catagories
use Yoeunes\Toastr\Facades\Toastr;


class HomeController extends Controller
{
// Méthode d'affichage de la page d'accueil avec la liste des images (pagination)
    public function index()
    {
        $image = Image::paginate(6); // Récupère 6 images par page pour la pagination
        return view('home.userpage',compact('image'));
    }

   public function redirect()
   {
    $usertype=Auth::user()->usertype; // Vérifie le type d'utilisateur (admin ou utilisateur normal)
    if($usertype=='1') // Si l'utilisateur est un admin
    {
        $total_image=image::all()->count(); //totale de image
        $total_order=order::all()->count(); //totale de order
        $total_user=user::all()->count(); //totale de user
       

        $order=order::all();
        $total_revenus=0;
        foreach($order as $order)
        {
            $total_revenus=$total_revenus + $order->price;

        }


        return view('admin.home',compact('total_image','total_order','total_user','total_revenus'));

    }    
    else // Si l'utilisateur est un utilisateur normal
    {
        $image = Image::paginate(6);
        return view('home.userpage',compact('image'));
    }
   }
   // Afficher les détails d'une image
    public function image_detaile($id)
    {
        $image = Image::find($id);
        return view('home.image_detaile',compact('image'));

    }
        // Ajouter un article au panier
        public function add_cart(Request $request, $id)
        {
            if(Auth::id()){ // Vérifie si l'utilisateur est authentifié
               $user=Auth::user(); // Récupère l'utilisateur connecté
               $image=image::find($id);
               $cart= new cart;

               // Remplir les champs du panier
               $cart->name=$user->name;
               $cart->email=$user->email;
               $cart->phone=$user->phone;
               $cart->email=$user->email;
               $cart->adress=$user->address;
               $cart->image_id=$image->id;
               $cart->user_id=$user->id;
               $cart->image_title=$image->title;
               $cart->price=$image->price;
               $cart->image=$image->image;
               $cart->quantite=$request->quantite;
               $cart->save();
               Toastr::success('L\'image a été ajoutée avec succès dans votre panier', 'Succès', [
                "positionClass" => "toast-top-right",
                "closeButton" => true,
                "progressBar" => true,
                "timeOut" => "10000"
            ]);
               return redirect()->back();

               
                
            }
            else{
                return redirect('register'); // Si l'utilisateur n'est pas connecté, le rediriger vers l'inscription
            }
        }

        // Afficher le panier de l'utilisateur connecté
        public function show_cart()
        {
            if(Auth::id())
            {
                $id = Auth::user()->id;
                $count = Cart::where('user_id', $id)->count();
                $cart = Cart::where('user_id', Auth::id())->get();
                
                return view('home.show_cart', compact('cart', 'count'));
            }
            else {
                return redirect('register');
            }
        }

            

        
            
        // Supprimer un article du panier
        public function remove_cart($id)
        {
            // Trouver l'article du panier par son ID
            $cart = Cart::find($id);

            // Vérifier si l'article existe avant de le supprimer
            if ($cart) {
                $cart->delete();

                // Ajouter un message de succès à la session
                session()->flash('message', 'L\'image a été supprimé avec succès!');
            } else {
                // Message d'erreur si l'article n'existe pas
                session()->flash('message', 'L\'image que vous souhaitez supprimer n\'existe pas!');
            }

            // Rediriger l'utilisateur vers la même page
            return redirect()->back();
        }



        // Confirmer une commande
        public function cash_order()
        {
            $user=Auth::user();
            $userid=$user->id;
            $data=cart::where('user_id','=',$userid)->get();
            
            foreach($data as $data)
            {
                 // Crée une nouvelle commande 
                $order=new order;
                $order->name=$data->name;
                $order->email=$data->email;
                $order->price=$data->price;
                $order->quantite=$data->quantite;
                $order->user_id=$data->user_id;
                $order->address=$data->adress;
                $order->phone=$data->phone;
                $order->image_title=$data->image_title;
                $order->image=$data->image;
                $order->image_id=$data->image_id;
 
                // Statut de la commande
                $order->payment_status='en cours de traitement';
                $order->delivery_status='en cours de traitement';

                $order->save();
                // Supprime les articles du panier une fois la commande enregistrée
                $cart_id=$data->id;
                $cart=cart::find($cart_id);
                $cart->delete();


            }
            return redirect()->back()->with('message','nous avons reçu votre commande. Nous vous contacterons bientôt');
           

        }




        public function search_catagorie(Request $request)
        {
            // Récupérer le texte de recherche
            $searchtext=$request->search;
            // Si le champ est vide, renvoyez un message d'erreur
            if (empty($searchtext)) {
                return redirect()->back()->with('error', 'Veuillez entrer un terme de recherche.');
            }
            // Si une recherche est effectuée, rechercher les images correspondantes
            $image=image::where('catagory','like','%'.$searchtext.'%')->paginate(6);
            
             // Vérifier si des résultats sont trouvés
             if ($image->isEmpty()) {
                return redirect()->back()->with('error', 'Aucun résultat trouvé pour "' . $searchtext . '"');
            }
        // Passer les images à la vue
            return view('home.userpage',compact('image'));
        }

       
       


        public function search_product(Request $request)
        {
            // Récupérer le texte de recherche
            $searchtext = $request->search;
        
            // Si le champ est vide, renvoyez un message d'erreur
            if (empty($searchtext)) {
                return redirect()->back()->with('error', 'Veuillez entrer un terme de recherche.');
            }
        
            // Si une recherche est effectuée, rechercher les images correspondantes
            $image = Image::where('catagory', 'like', '%' . $searchtext . '%')->paginate(6);
        
            // Vérifier si des résultats sont trouvés
            if ($image->isEmpty()) {
                return redirect()->back()->with('error', 'Aucun résultat trouvé pour "' . $searchtext . '"');
            }
        
            // Passer les images à la vue
            return view('home.all_product', compact('image'));
        }
        
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
        public function show_order()
        {
            if(Auth::id())
            {
                $user=Auth::user();
                $userid=$user->id;
                $order=order::where('user_id','=',$userid)->get();
                return view('home.order',compact('order'));
              
            }
            else
            {
                return redirect('login');
            }
           

        }




        public function products()
       {
        $image = Image::paginate(6); // Récupère 6 images par page pour la pagination
        return view('home.all_product',compact('image'));
       } 
      











       
        //hethi fonction mt3 stripe eli hiya mt3 5las en ligne 
       public function stripe($totalprice)
       {
        return view('home.stripe',compact('totalprice'));
       }

       public function portfolio() 
       {
        $categories = catagorie::all(); // Récupère toutes les catégories
        return view('home.portfolio', compact('categories'));
        
        
       }
     

       public function propos()
       {
        return view('home.propos');
       }



       public function contact()
       {
        return view('home.contact');
       }
       
       
}
