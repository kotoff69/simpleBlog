<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRevisionForeignKeyPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('revision_id')
                ->nullable(true)
                ->default(null)
                ->comment('Text revision id');

            $table->foreign('revision_id', 'fk-revision_id-posts_revisions')
                ->references('id')
                ->on('posts_revisions')
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
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign('fk-revision_id-posts_revisions');
            $table->dropColumn('revision_id');
        });
    }
}
