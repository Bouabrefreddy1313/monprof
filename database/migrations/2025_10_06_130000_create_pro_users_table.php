<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/*
 * Comptes de l'espace entreprises (ancien site 2, table users renommée pro_users).
 * La table "sessions" du site 2 n'est pas reprise : on garde les tables techniques du site 1.
 */
return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('pro_users')) {
            Schema::create('pro_users', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('role')->default('user');
                $table->string('password');
                $table->rememberToken();
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('pro_password_reset_tokens')) {
            Schema::create('pro_password_reset_tokens', function (Blueprint $table) {
                $table->string('email')->primary();
                $table->string('token');
                $table->timestamp('created_at')->nullable();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('pro_password_reset_tokens');
        Schema::dropIfExists('pro_users');
    }
};
