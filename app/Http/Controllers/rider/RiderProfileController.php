<?php

namespace App\Http\Controllers\rider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RiderProfileController extends Controller
{
    public function index() {
        return view('rider.rider-profile');
    }

    public function passwordAndSecurity() {
        return view('rider.rider-password-and-security');
    }

    public function deleteAccount() {
        return view('rider.delete-account');
    }
}
