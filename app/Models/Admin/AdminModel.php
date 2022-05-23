<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdminModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'admin';
    protected $fillable = [
        'username',
        'password',
    ];

    public static function login($username, $password) {
        /**
         * param: $username
         * param: $password
         * return: boolean
         */
        $data = DB::table('admin')->where(['username' => $username, 'password' => $password])->exists();
        if ($data) {
            return true;
        }
    
        return false;
    }

    public static function getApplications() {
         /**
         * function -> update the status of applicants and delete from the list
         * return: array of applcant/user data
         */
        $users = DB::table('riders')
            ->leftJoin('applicants', 'riders.rider_id', '=', 'applicants.rider_id')
            ->where('riders.verified', 0)
            ->get();

        return $users;
    }

    public static function updateVerified($id) {
        /**
         * param: $id -> the id of the user retrieve from session
         * function -> update the status of applicants and delete from the list
         * return: true or false
         */
        $affected1 = DB::table('riders')->where('rider_id', $id)->update(['verified' => 1]);
        
        if($affected1){
            $affected = DB::table('applicants')->where('rider_id', $id)->delete();
            return $affected;
        }
        
    }
    
    //get only email
    public static function get_applicant_email($id){
         /**
         * param: $id -> the id of the user retrieve from session
         * function -> get the applicants/user email 
         * return: email
         */
        $email = DB::table('riders')
            ->where('rider_id', $id)
            ->pluck('email');

        return $email[0]; // pluck value is in array form where the value we need is in index 0 only
    }
}
