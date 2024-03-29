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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('role')->default('user');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('google_id')->nullable();
            $table->string('foto')->nullable();
            $table->integer('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('dateofbirth')->nullable();
            $table->string('gender')->nullable();
            $table->string('institute')->default('-');
            $table->string('user_code')->default(Str::random(10));
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
