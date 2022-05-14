<?php

namespace App\Http\Controllers\rider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RiderDashboardController extends Controller
{
    public function index() {
        return view('rider.rider-dashboard');
    }

    public function accepted() {
        return view('rider.rider-accepted');
    }

    public function requestDetails($id) {
        return view('rider.rider-request');
    }
}
