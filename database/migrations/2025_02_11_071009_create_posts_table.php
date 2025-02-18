<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('posts')) {
            Schema::create('posts', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->text('content');
                $table->string('image')->nullable();
                $table->unsignedBigInteger('likes')->default(0);
                $table->boolean('status')->default(1);
                $table->timestamps();
                $table->softDeletes();

                $table->unsignedBigInteger('category_id')->nullable();

                $table->foreign('category_id')->references('id')->on('categories'); // ushbu migratsiya db dagi tablega `posts` tableiga `category_id` (column) ni qo'shada va tabledagi `categories` jadvali bilan "status" bilan bog'laydi
//                $table->foreignId('category_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
