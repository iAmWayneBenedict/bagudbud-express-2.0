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
        $data = DB::table('admin')->where(['username' => $username, 'password' => $password])->select('id')->first();
        if ($data->id >= 1) {
            return true;
        }
    
        return false;
    }

    public static function getApplications() {
        $users = DB::table('riders')
            ->leftJoin('applicants', 'riders.rider_id', '=', 'applicants.rider_id')
            ->get();

        return $users;
    }

    public static function updateVerified($id) {
        $affected = DB::table('riders')->where('rider_id', $id)->update(['verified' => 1]);

        return $affected;
    }
    
}
