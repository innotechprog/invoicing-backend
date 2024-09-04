<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    use HasFactory;
    protected $table = 'address';
    protected $fillable = [
        'address_id',
        'address_1',
        'address_2',
        'address_3',
        'city',
        'state',
        'code',
        'country',
        'customer_id' // Add any other attributes you need here
    ];
}
