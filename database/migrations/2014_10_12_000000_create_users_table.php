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
            $table->string('name', 100);
            $table->string('email', 320)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('user_name', 320)->unique();
            $table->string('user_type_code', 15)->default('user');// super-admin, admin, user
            $table->enum('gender_code', ['male', 'female', 'other'])->nullable();
            $table->string('avatar', 255)->nullable();
            $table->enum('web_access', ['all', 'admin', 'web'])->default('web');
            $table->tinyInteger('is_active')->default(0);
            $table->string('password', 255);
            $table->rememberToken();
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();
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
