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
        Schema::create('sparepart_brand_suppliers', function (Blueprint $table) {
            $table->foreignId('supplier_id')
                ->constrained();
            $table->foreignId('sparepart_brand_id')
                ->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brand_suppliers');
    }
};
