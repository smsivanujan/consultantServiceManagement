<?php

use App\Enums\DayEnum;
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
        Schema::create('consultant_available_dates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('consultant_id')->unsigned();
            $table->string('day')->default(DayEnum::MONDAY())->index();
            $table->timestamps();
            $table->foreign('consultant_id')->references('id')->on('consultants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultant_available_dates');
    }
};
