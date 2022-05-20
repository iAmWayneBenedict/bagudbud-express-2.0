<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client\ClientModel;
use Illuminate\Support\Facades\Session;


class ClientProfileController extends Controller
{
    public function index() {
        $c_data = $this->get_client_user_data();
        return view('client.client-profile', compact('c_data'));
    }

    public function get_client_user_data(){
        $user_id = session('user_id');  
        $user_data = ClientModel::get_user_data($user_id);

        return $user_data;    
    }

    public function updtae_profile(Request $request){
        $user_id = session('user_id');
    }

    public function client_delete_account(){
        $user_id = session('user_id');
        $is_delete = ClientModel::where('Client_id', $user_id)->delete();

        if($is_delete == 1){
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

    public function c_logout(Request $request){
        if(Session::has('user_id')){
            $request->session()->forget('user_id');
            return redirect('client-login');
        }
    }

    public function add(Request $req) {
        // get the data for the profile from the database then pass to the view
        // include data in view
        return view('client.client-profile', ['req' => $req->all()]);
    }
}
