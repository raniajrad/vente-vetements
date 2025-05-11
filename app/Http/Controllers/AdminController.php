<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\catagorie;  // Modèle pour gérer les catégories
use App\Models\Image;
use App\Models\order;

class AdminController extends Controller
{
    // Affiche toutes les catégories dans la vue admin.catagory
    public function view_catagory()
    {
        $data = catagorie::all();  //  Récupérer toutes les catégories depuis la base de données
        return view('admin.catagory',compact('data')); // Retourner la vue avec les données de catégories
    }
    // Ajouter une nouvelle catégorie
    public function add_catagorie(Request $request)
    {
        $data=new catagorie; // Créer une nouvelle instance de catégorie
        $data->name=$request->catagorie; // Assigner le nom de la catégorie depuis la requête
        $data->save(); // Sauvegarder la catégorie dans la base de données
        return redirect()->back()->with('message', 'Ajouter de catégorie avec succès'); // Rediriger avec un message de succès
    }
    // Afficher la vue pour ajouter une image 
    public function add_image()
    {
        $catagorie=catagorie::all();
        return view('admin.add_image',compact('catagorie')); // Retourner la vue pour ajouter une image avec les catégories
    }    
        // Ajouter une image à la base de données
        public function ajout_image(Request $request)
        {
        // Crée une nouvelle instance du modèle Image
        $image = new Image;

        // Remplir les champs depuis la requête
        $image->title = $request->title;
        $image->description = $request->description;
        $image->price = $request->price;
        $image->quantite = $request->quantite;
        $image->catagory = $request->catagory;

        // Gestion de l'image téléchargée
        $uploadedImage = $request->image; // Renommez ici pour éviter les conflits
        $imagename = time() . '.' . $uploadedImage->getClientOriginalExtension();
        $uploadedImage->move('image', $imagename);
        $image->image = $imagename;

        // Enregistrer l'image dans la base de données
        $image->save();

        // Retour avec un message de succès
        return redirect()->back()->with('message', 'Image ajoutée avec succès');
        }


        // Afficher toutes les images
        public function show_image()
        {
            $image=image::all();
            return view('admin.show_image',compact('image'));
        }

        
        // Supprimer une image
        public function delete_image($id)
        {
            $image=image::find($id);
            $image->delete();
            // Retour avec un message de delete
            return redirect()->back()->with('message', 'Image supprimer avec succès');
        }
         // Afficher la vue pour modifier une image
        public function modfier_image($id)
        {
            $image=image::find($id); // Trouver l'image par son ID
            $catagorie=catagorie::all();
            return view('admin.modfier_image',compact('image','catagorie'));

        }
        // Confirmer la modification de l'image
        public function modfier_image_confirm(Request $request,$id)
        {
             // Récupérer l'image à modifier dans la base de données
            $image=image::find($id);
            // Mettre à jour les champs texte
            $image->title=$request->title;
            $image->description=$request->description;
            $image->price=$request->price;
            $image->quantite=$request->quantite;
            $image->catagory=$request->catagory;

            // Gestion de l'image téléchargée
            if ($request->hasFile('image')) {
                $uploadedImage = $request->file('image'); // Récupérer le fichier téléchargé
                $imagename = time() . '.' . $uploadedImage->getClientOriginalExtension();
                $uploadedImage->move(public_path('image'), $imagename); // Déplacer le fichier dans le répertoire "public/image"
        
                // Mettre à jour le champ image
                $image->image = $imagename;
            }
            // Sauvegarder les modifications dans la base de données
            $image->save();

            // Retour avec un message de modfier
            return redirect()->back()->with('message', 'Image modifié avec succès');


        }
        // Afficher toutes les commandes
        public function order()
        {
            $order=order::all();
            return view('admin.order',compact('order'));
        }

        // Afficher 
        public function searchdata(Request $request)
        {
            $searchtext=$request->search;
            $order=order::where('name','like','%'.$searchtext.'%')->orWhere('image_title','like','%'.$searchtext.'%')->orWhere('phone','like','%'.$searchtext.'%')->get();
            return view('admin.order',compact('order'));

        }


        public function search_liste_image(Request $request)
        {
            $searchtext=$request->search;
            $image=image::where('title','like','%'.$searchtext.'%')->orWhere('catagory','like','%'.$searchtext.'%')->get();
            return view('admin.show_image',compact('image'));
        }
}
