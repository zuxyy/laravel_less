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

            $table->index('category_id', 'post_category_id_index');

            $table->foreign('category_id', 'post_category_fk')->on('categories')->references('id')->onDelete();

        });
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
