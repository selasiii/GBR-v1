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
        Schema::create('regions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('city');
            $table->string('city_code');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('terminals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('region_id')->on('regions')->index();
            $table->string('location');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->decimal('price', 8, 2);
            $table->foreignId('start_terminal_id')->on('terminals')->index();
            $table->foreignId('end_terminal_id')->on('terminals')->index();
            $table->timestamps();
            $table->softDeletes();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routes');
        Schema::dropIfExists('terminals');
        Schema::dropIfExists('regions');
    }
};
