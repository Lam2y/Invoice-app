<?php

// app/Models/Customer.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // Define the inverse relationship
    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'customer_id');
    }
}

