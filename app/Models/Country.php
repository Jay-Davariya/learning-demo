<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $table ="countrys";
    protected $fillable =["id","country"];
    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}
