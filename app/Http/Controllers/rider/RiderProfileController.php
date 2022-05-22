<?php

namespace App\Http\Controllers\rider;

use Illuminate\Http\Request;
use App\Models\Rider\RiderModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

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

     // rider delete account
     public function rider_delete_account(Request $request){
        $user_id = session('user_rider_id');
        $is_delete = RiderModel::where('rider_id', $user_id)->delete();

        if($is_delete == 1){
            $request->session()->forget('user_rider_id');
            return response()->json([
                'code' => 200 
            ]);
        }
        else{
            return response()->json([
                'code' => 404 
            ]);
        }
        
    }

    //logout function
    public function r_logout(Request $request){
        if(Session::has('user_rider_id')){
            $request->session()->forget('user_rider_id');
            return redirect('/rider-login');
        }
    }
}
