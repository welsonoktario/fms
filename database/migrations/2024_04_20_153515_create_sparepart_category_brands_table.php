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
        Schema::create('sparepart_category_brands', function (Blueprint $table) {
            $table->foreignId('sparepart_category_id')
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
        Schema::dropIfExists('sparepart_category_brands');
    }
};
