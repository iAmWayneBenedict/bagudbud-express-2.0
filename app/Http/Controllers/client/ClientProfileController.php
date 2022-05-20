<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientProfileController extends Controller
{
    public function index() {
        return view('client.client-profile');
    }

    public function add(Request $req) {
        // get the data for the profile from the database then pass to the view
        // include data in view
        return view('client.client-profile', ['req' => $req->all()]);
    }
}
