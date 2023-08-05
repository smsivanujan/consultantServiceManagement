<?php

use App\Enums\GenderEnum;
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
        Schema::create('jobseekers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('job_seeker_code',25)->unique();
            $table->string('job_seeker_first_name', 50);
            $table->string('job_seeker_last_name', 50);
            $table->string('nic', 20)->unique();
            $table->date('date_of_birth');
            $table->string('gender')->default(GenderEnum::MALE())->index();
            $table->integer('phone_number')->unique();
            $table->string('email',50)->unique()->nullable();
            $table->longText('location')->nullable();
            $table->longText('image')->nullable();
            $table->longText('note')->nullable();
            $table->integer('is_active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobseekers');
    }
};
