<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToIdeasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ideas', function (Blueprint $table) {
            $table->foreign(['departmentID'], 'idea_FK')->references(['id'])->on('departments')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['categoryID'], 'idea_FK_1')->references(['id'])->on('categories')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['staffId'], 'idea_FK_2')->references(['id'])->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['reactionID'], 'idea_FK_3')->references(['id'])->on('reactions')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ideas', function (Blueprint $table) {
            $table->dropForeign('idea_FK');
            $table->dropForeign('idea_FK_1');
            $table->dropForeign('idea_FK_2');
            $table->dropForeign('idea_FK_3');
        });
    }
}
