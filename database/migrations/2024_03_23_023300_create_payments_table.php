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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
        
            $table->foreignId('user_id')->constrained('users');
        
            $table->decimal('amount', 10, 2);
            $table->string('payment_method');
        
            $table->string('mobile_money_account')->nullable();
        
            $table->enum('status', ['completed', 'pending', 'failed'])->default('pending');
            $table->timestamp('transaction_date');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
