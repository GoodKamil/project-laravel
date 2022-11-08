<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_U');
            $table->string('first_name',100);
            $table->string('last_name',100);
            $table->integer('email_user');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('position')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
