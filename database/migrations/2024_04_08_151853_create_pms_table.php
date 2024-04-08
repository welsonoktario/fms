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
        Schema::create('pms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unit_id')
                ->constrained();
            $table->foreignId('driver_id')
                ->constrained();
            $table->foreignId('maintenance_type_id')
                ->constrained();
            $table->dateTime('maintenance_date')
                ->useCurrent();
            $table->dateTime('next_maintenance_date');
            $table->string('note')
                ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pms');
    }
};
