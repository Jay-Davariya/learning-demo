<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shopkeeper extends Model
{
    use HasFactory;

    protected $table ="shopkeepers";

    protected $fillable =["id","name"];
    public function customers()
    {
        return $this->belongsToMany(Customer::class, 'custom_shopkeeper', 'shopkeeper_id', 'customer_id')
            ->withTimestamps(); 
    }
    
}
