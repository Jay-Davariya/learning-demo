<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customshopkeeper extends Model
{
    use HasFactory;
    protected $table ="custom_shopkeeper";

    protected $guarded =["id"];
}
