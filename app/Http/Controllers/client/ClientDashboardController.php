<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Models\Client\ClientModel;
use App\Http\Controllers\Controller;

class ClientDashboardController extends Controller
{
    public function index() {
        $user_id = session('user_id');  
        $user_data = ClientModel::get_user_data($user_id);
        
        return view('client.client-dashboard', compact('user_data'));
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
