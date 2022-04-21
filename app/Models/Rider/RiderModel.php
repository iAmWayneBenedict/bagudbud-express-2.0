<?php

namespace App\Models\Rider;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RiderModel extends Model
{
    use HasFactory;
    use HasFactory;
    public $timestamps = false;
    protected $table = 'riders';
    protected $fillable = [
        'password',
        'f_name',
        'l_name',
        'address',
        'municipality',
        'email',
        'contact_num',
        'vehicle_type',
    ];

    public static function apply($id){
        /**
         * param: id: the id of the new applicant/rider
         * return: get the last insert id used for sending mail
         */
        $id = DB::table('applicants')
            ->insertGetId($id);

        return $id;
    }

    public function login_process($email, $password){
        /* 
            param: email: rider email for the account
            param: password: clear text password
        */

        // return values
        $not_verified = "E1";
        $email_not_found = "E2";
        $wrong_password = "E3";

        $login = DB::table('riders')
            ->where('email', $email)
            ->first(); # get the first row if match
        
        if($login){
            if($login->verified == 0){
                return $not_verified;
            }
            else{
                if(Hash::check($password, $login->password)){
                    return $login->rider_id;
                }
                else{
                    return $wrong_password;
                }
            }
        }
        else{
            return $email_not_found;
        }
    }
}
