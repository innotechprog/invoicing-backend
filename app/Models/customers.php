<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customers extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //public $timestamps = false;
    protected $fillable = [
        'customer_id',
        'customer_name',
        'customer_surname',
        'customer_email',
        'customer_cellphone',
        'password',
        'profile_pic' // Add any other attributes you need here
    ];
}
