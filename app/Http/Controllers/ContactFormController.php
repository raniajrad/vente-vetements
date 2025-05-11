<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    public function post_message(Request $request)
    {
        return $request->all();
       
    }
}
