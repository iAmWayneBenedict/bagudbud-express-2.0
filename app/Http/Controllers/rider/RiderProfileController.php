<?php

namespace App\Http\Controllers\rider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rider\RiderModel;

class RiderProfileController extends Controller
{
    public function index() {
        $c_data = $this->get_rider_user_data();
        if ($c_data->profile_pic === null) {
            $c_data->profile_pic = 1;
        }
        return view('rider.rider-profile', ['c_data' => $c_data]);
    }

    public function passwordAndSecurity() {
        return view('rider.rider-password-and-security');
    }

    public function deleteAccount() {
        
        return view('rider.delete-account');
    }

    //retrieve data from database
    public function get_rider_user_data(){
        $user_id = session('user_rider_id');  
        $user_data = RiderModel::get_rider_data($user_id);
        
        return $user_data;    
    }

    public function updateRiderProfile(Request $request) {
        $user_id = session('user_rider_id');
        $data = $request->all();
        array_shift($data);
        $affected = RiderModel::updateRiderProfile($user_id, $data);
        $c_data = $this->get_rider_user_data();
        if ($c_data->profile_pic === null) {
            $c_data->profile_pic = 1;
        }
        return view('rider.rider-profile', ['c_data' => $c_data]);
    }
}
