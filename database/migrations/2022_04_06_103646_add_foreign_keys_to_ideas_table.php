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
            $table->foreign(['departmentID'], 'idea_FK')->references(['id'])->on('departments')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['categoryID'], 'idea_FK_1')->references(['id'])->on('categories')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['staffId'], 'idea_FK_2')->references(['id'])->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['reactiondID'], 'idea_FK_3')->references(['id'])->on('reactions')->onUpdate('NO ACTION')->onDelete('NO ACTION');
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
