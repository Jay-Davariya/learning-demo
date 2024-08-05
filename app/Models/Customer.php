<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Shopkeeper;


class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "customers";

    protected $guarded = ['id'];

    public function shopkeeperCustomer()
    {
        return $this->belongsTo(Shopkeeper::class, 'shopkeeper', 'id');
    }

    public function countryCustomer()
    {
        return $this->belongsTo(Country::class, 'country', 'id');
    }

    public function stateCustomer()
    {
        return $this->belongsTo(State::class, 'state', 'id');
    }

    public function cityCustomer()
    {
        return $this->belongsTo(City::class, 'city', 'id');
    }
    public function shopkeepers()
    {
        return $this->belongsToMany(Shopkeeper::class, 'custom_shopkeeper', 'customer_id', 'shopkeeper_id')
            ->withTimestamps();
    }
   public function products()
        {
            return $this->hasMany(customerproduct::class, 'customer_id');
        }
    }


