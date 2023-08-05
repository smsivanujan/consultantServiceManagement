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
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_seeker_id')->unsigned();
            $table->integer('consultant_id')->unsigned();
            $table->integer('appointment_type_id')->unsigned();
            $table->dateTime('appointment_dateTime');
            $table->integer('is_active');
            $table->timestamps();
            $table->foreign('job_seeker_id')->references('id')->on('jobseekers')->onDelete('cascade');
            $table->foreign('consultant_id')->references('id')->on('consultants')->onDelete('cascade');
            $table->foreign('appointment_type_id')->references('id')->on('appointment_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
