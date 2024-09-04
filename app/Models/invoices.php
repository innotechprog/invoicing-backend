<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoices extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_id',
        'customer_id',
        'invoice_date',
        'invoice_time',
        'invoice_due_date',
        'total_amount',
        'status' // Add any other attributes you need here
    ];
}
