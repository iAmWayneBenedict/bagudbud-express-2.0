<?php

namespace App\Models\Rider;

use Illuminate\Support\Facades\DB;
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
}
