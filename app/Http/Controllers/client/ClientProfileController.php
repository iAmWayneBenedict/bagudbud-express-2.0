<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client\ClientModel;
use Illuminate\Support\Facades\Session;


class ClientProfileController extends Controller
{
    public function index() {
        //display retrieve data to views
        $c_data = $this->get_client_user_data();
        if ($c_data->profile_pic === null) {
            $c_data->profile_pic = 1;
        }
        return view('client.client-profile', compact('c_data'));
    }

    //retrieve data from database
    public function get_client_user_data(){
        $user_id = session('user_id');  
        $user_data = ClientModel::get_user_data($user_id);

        return $user_data;    
    }

    //update the profile data of client/user
    public function updateProfile(Request $request){
        $user_id = session('user_id'); 
        $data = $request->all();
        array_shift($data);
        $affected = ClientModel::updateCLientProfile($user_id, $data);
        $c_data = $this->get_client_user_data();
        if ($c_data->profile_pic === null) {
            $c_data->profile_pic = 1;
        }
        return view('client.client-profile', ['req' => $request->all(), 'c_data' => $c_data]);
    }

    // user/client delete account
    public function client_delete_account(Request $request){
        $user_id = session('user_id');
        $is_delete = ClientModel::where('Client_id', $user_id)->delete();

        if($is_delete == 1){
            $request->session()->forget('user_id');
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
    public function c_logout(Request $request){
        if(Session::has('user_id')){
            $request->session()->forget('user_id');
            return redirect('/client-login');
        }
    }

}
