<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
     // Méthode pour afficher tous les utilisateurs
    public function view_user() {
        $data = User::all();
        return view('admin.view_user',compact('data'));
    }

    // Méthode pour supprimer un utilisateur
    public function delete_user($id)
    {
        $data=User::find($id);
        $data->delete();
        return redirect()->back()->with('message','utilisateur supprimer avec success ');

    }
}
