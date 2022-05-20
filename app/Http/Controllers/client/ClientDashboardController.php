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

    public function successDeliveries() {
        return view('client.success-deliveries');
    }

    public function clientPasswordAndSecurity() {
        return view('client.client-password-and-security');
    }

    public function tracking() {
        return view('client.client-tracking');
    }

    public function clientRequestAccepted() {
        return view('client.client-request-accepted');
    }
}
