<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdeaClosuredates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('idea_closuredates', function (Blueprint $table) {
            $table->id();
            $table->timestamp('idea_closuredate')->nullable();
            $table->timestamp('comment_closuredate')->nullable();
            $table->string('academic_Year');
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
        Schema::dropIfExists('idea_closuredates');
    }
}
