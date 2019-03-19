<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('post_id')
                ->nullable(false)
                ->comment('Post id');
            $table->unsignedBigInteger('parent_id')
                ->nullable(true)
                ->default(null)
                ->comment('Parent comment id (for reply)');
            $table->text('text')
                ->nullable(false)
                ->comment('Comment text');
            $table->unsignedBigInteger('user_id')
                ->nullable(false)
                ->comment('User id');
            $table->timestamps();

            $table->index('post_id');

            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('parent_id')
                ->references('id')
                ->on('posts_comments')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts_comments');
    }
}
