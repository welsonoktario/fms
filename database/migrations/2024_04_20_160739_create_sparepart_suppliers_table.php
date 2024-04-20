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
        Schema::create('sparepart_suppliers', function (Blueprint $table) {
            $table->foreignId('sparepart_id')
                ->constrained();
            $table->foreignId('sparepart_supplier_id')
                ->constrained();
            $table->int('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sparepart_suppliers');
    }
};
