<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefaultChatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('default_chat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('repost_chat_id')->nullable();
            $table->unsignedBigInteger('repost_message_id')->nullable();
            $table->text('message');
            $table->integer('file_id')->nullable();
            $table->timestamp('date')->useCurrent();
            $table->integer('status')->default(0);
            $table->string('read_users_id', 100)->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('none');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('default_chat');
    }
}
