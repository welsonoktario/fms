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
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['Urgent', 'Non Urgent', 'Stock']);
            $table->foreignId('sparepart_id')
                ->constrained();
            $table->foreignId('asset_type_id')
                ->constrained();
            $table->foreignId('project_id')
                ->constrained();
            $table->string('type_item');
            $table->string('name_item');
            $table->string('quantity');
            $table->string('price');
            $table->longText('description');
            $table->enum('status_submission',['Waiting For Approval','Approve','Rejected']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};
