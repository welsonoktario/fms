<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->unique();
            $table->string('name');
            $table->string('phone_number');
            $table->enum('provider',['TELKOMSEL','INDOSAT','XL AXIATA','SMARTFREN']);
            $table->enum('status',['ACTIVE','NOT ACTIVE']);
            $table->string('link_barcode')->nullable();
            $table->string('image_barcode')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
