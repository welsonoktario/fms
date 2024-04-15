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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')
                ->constrained();
            $table->foreignId('driver_id')
                ->nullable()
                ->constrained();
            $table->foreignId('asset_type_id')
                ->constrained();
            $table->string('no_asset');
            $table->string('name');
            $table->string('plate');
            $table->string('model');
            $table->string('meter');
            $table->string('colour');
            $table->string('serial');
            $table->date('date_pajak');
            $table->string('image_unit');
            $table->longText('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
