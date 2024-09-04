<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class companies extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'company_id',
        'company_name',
        'company_tel',
        'company_email',
        'company_logo',
        'type',
        'address_id',
        'customer_id' // Add any other attributes you need here
    ];
}
