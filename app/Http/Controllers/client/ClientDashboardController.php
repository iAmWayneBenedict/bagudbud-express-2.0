<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientDashboardController extends Controller
{
    public function index() {
        return view('client.client-dashboard');
    }

    public function notifications() {
        return view('client.notification');
    }

    public function notificationDetail() {
        return view("client.notification-detail");
    }

    public function cancelledRequests() {
        return view('client.cancelled-deliveries');
    }

    public function cancelledRequestsDetail() {
        return view('client.cancelled-delivery-details');
    }
}
