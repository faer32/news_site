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
        Schema::table('users', function (Blueprint $table) {
            $table->string('patronymic')->nullable()->change();
            $table->string('url_picture')->nullable()->change();
            $table->string('signature')->nullable()->change();
            $table->string('role')->nullable()->change();
            $table->boolean('activate')->default(false)->change();
            $table->boolean('creating_an_article')->default(true)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

        });
    }
};
