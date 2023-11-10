<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->unsignedBigInteger('userID')->index('comments_FK');
            $table->text('commentDetails');
            $table->bigInteger('ideaID')->index('comments_FK_1');
            $table->timestamp('createdAt')->nullable();
            $table->timestamp('updateAt')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
