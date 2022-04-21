<?php

namespace App\Http\Controllers\rider;

use App\Rules\ContactNumber;
use Illuminate\Http\Request;
use App\Models\Rider\RiderModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RiderController extends Controller
{
    public function riderLogin() {
        return view('rider.rider-login');
    }



    

    /**
     @Rider section ------------->
     */

    public function riderSignup() {
        return view('rider.rider-signup');
    }

    public function store(Request $request){

        /**
            *validate inputs from the user
            @ContactNumber -> validate contact number
        */

        $validator = Validator::make($request->all(), [
            'password' => 'required|min:8',
            'f_name' => 'required|regex:/^[a-zA-Z\\s]+$/u',
            'l_name' => 'required|regex:/^[a-zA-Z\\s]+$/u',
            'zone' => 'required|',
            'barangay' => 'required|',
            'municipality' => 'required|',
            'email' => ['required', 'email', 'unique:riders'],
            'contact_num' => ['required', new ContactNumber],
            'vehicle_type' => 'required|',
        ], [
            'f_name.required' => 'The First Name field is required',
            'l_name.required' => 'The Last Name field is required',
            'f_name.regex' => 'First Name is Invalid Format',
            'l_name.regex' => 'Last Name is Invalid Format'
        ]);

        if($validator->fails()){
            //return json messages if validator detect errors
            return response()->json([
                'code' => 404,
                'errors' => $validator->getMessageBag()
            ]);
        }

        // password hash before inserting into database
        $password = Hash::make($request->password);
        $address = "{$request->zone}, {$request->barangay}";
        $email = $request->email;

        $input_data = [
            'password' => $password,
            'f_name' => ucwords($request->f_name),
            'l_name'=> ucwords($request->l_name),
            'address' => ucwords($address),
            'municipality' => $request->municipality,
            'email' => $email,
            'contact_num' => $request->contact_num,
            'vehicle_type' => $request->vehicle_type
        ];

        $store = RiderModel::create($input_data);
        if($store){

            $application_id = RiderModel::apply(['rider_id' => $store->id]);

            $mail_data = [
                'apply_id' => $application_id,
                'name' => ucwords($request->f_name . ' '. $request->l_name)
            ];
            // Mail::to($email)->send(new RegisterSendEmail($mail_data));
            return response()->json([
                'code' => 200
            ]);
        }

    }

}
