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
        Schema::create('consultant_available_times', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('consultant_availabe_date_id')->unsigned();
            $table->time('available_time');
            $table->integer('is_active');
            $table->timestamps();
            $table->foreign('consultant_availabe_date_id')->references('id')->on('consultant_available_dates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultant_available_times');
    }
};
