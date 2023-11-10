<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdeasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ideas', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->unsignedBigInteger('staffId')->index('idea_FK_2');
            $table->bigInteger('reactiondID')->nullable()->index('idea_FK_3');
            $table->string('viewCount', 100)->nullable();
            $table->string('status', 100)->nullable();
            $table->bigInteger('categoryID')->index('idea_FK_1');
            $table->bigInteger('departmentID')->index('idea_FK');
            $table->text('idealDetails');
            $table->string('title', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ideas');
    }
}
