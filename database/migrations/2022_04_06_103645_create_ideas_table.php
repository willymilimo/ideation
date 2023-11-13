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
            $table->unsignedBigInteger('staffId')->index('idea_user_id_fk');
            $table->bigInteger('reactionID')->nullable()->index('idea_reaction_id_fk');
            $table->string('viewCount', 100)->nullable();
            $table->string('status', 100)->nullable();
            $table->bigInteger('categoryID')->index('idea_category_fk');
            $table->bigInteger('departmentID')->index('idea_department_id_fk');
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
