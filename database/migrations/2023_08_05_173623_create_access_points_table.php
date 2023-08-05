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
        Schema::create('access_points', function (Blueprint $table) {
            $table->increments('id');
            $table->string('display_name');
            $table->string('value');
            $table->integer('access_model_id')->unsigned();
            $table->longText('description')->nullable();
            $table->foreign('access_model_id')->references('id')->on('access_models')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('access_points');
    }
};
