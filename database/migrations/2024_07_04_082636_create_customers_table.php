<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unique('email');
            $table->string('product_name');
            $table->integer('mrp');
            $table->integer('sellprice');
            $table->string('expiry');
            $table->foreign('country');
            $table->foreign('state');
            $table->foreign('city');
            $table->string('address');
            $table->softDeletes('deleted_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void    
    {   
        Schema::dropIfExists('customers');
    }
};
