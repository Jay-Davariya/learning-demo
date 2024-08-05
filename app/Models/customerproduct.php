<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customerproduct extends Model
{
    use HasFactory;
    protected $table ="customer_product";

    protected $guarded = ["id"];

    public function productCustomer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    } 
   

}



 