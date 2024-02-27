<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('login', 60);
            $table->string('password', 200);
            $table->string('name', 100);
            $table->text('description');
            $table->timestamp('date_create');
            $table->timestamp('date_last_connection');
            $table->integer('phone');
            $table->string('email', 200);
            $table->integer('status')->default(1);
            $table->integer('type')->default(4);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
}
