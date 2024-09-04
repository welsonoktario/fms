<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('asset_code')->unique();
            $table->foreignId('project_id')
                ->constrained();
            // $table->foreignId('driver_id')
            //     ->nullable()
            //     ->constrained();
            // $table->foreignId('asset_type_id')
            //     ->constrained();
            // $table->string('no_asset');
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('year');
            $table->string('plate');
            $table->string('model');
            $table->string('meter');
            $table->string('colour');
            $table->string('type');
            $table->string('serial');
            $table->string('tire_size_front');
            $table->string('tire_size_rear');
            $table->string('tire_pressure_front');
            $table->string('tire_pressure_rear');
            $table->enum('status', ['READY', 'NOT READY']);
            $table->date('unit_tax_duedate');
            $table->string('image_unit');
            $table->longText('description');
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
        Schema::dropIfExists('units');
    }
};
