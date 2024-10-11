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
        Schema::create('daily_monitoring_units', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unit_id')
                ->constrained();
            $table->foreignId('user_id')
                ->nullable()
                ->constrained();
                $table->foreignId('driver_id')
                ->nullable()
                ->constrained();
                $table->enum('radiator_coolant',['C','K']);
                $table->enum('battery_electrolyte',['C','K']);
                $table->enum('engine_oil',['C','K']);
                $table->enum('hydraulic_oil',['C','K']);
                $table->enum('transmission_oil',['C','K']);
                $table->enum('engine_noise',['C','K']);
                $table->enum('engine_condition',['C','K']);
                $table->longText('issue');
                $table->enum('status_unit',['READY','NOT READY']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_monitoring_units');
    }
};
