<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'total',
        'customer_id',
        'sub_total',
        'date',
        'due_date',
        'reference',
        'discount',
        'number',
        'terms_and_conditions'
    ];
    // Define the relationship
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function invoice_items(){
        return $this->hasMany(InvoiceItem::class);
    }
}

