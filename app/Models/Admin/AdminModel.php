<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'admin';
    protected $fillable = [
        'username',
        'password',
    ];

    
}
