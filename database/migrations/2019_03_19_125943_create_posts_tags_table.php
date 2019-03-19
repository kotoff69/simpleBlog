<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('post_id')
                ->nullable(false)
                ->comment('Post id');
            $table->string('tag', 255)
                ->nullable(false)
                ->charset('utf8mb4')
                ->collation('utf8mb4_unicode_ci')
                ->comment('Tag');
            $table->timestamps();

            $table->index('tag');
            $table->index('post_id');

            $table->unique(['post_id', 'tag']);

            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts_tags');
    }
}
