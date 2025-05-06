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
    
        Schema::create('travel_worker', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('travel_id')->constrained('travel')->onDelete('cascade');
            $table->foreignId('worker_id')->constrained('workers')->onDelete('cascade');

        });





    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
