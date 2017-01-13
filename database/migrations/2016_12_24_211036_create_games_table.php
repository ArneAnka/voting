<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            // $table->integer('game_id')->unsigned()->nullable();
            $table->string('title');
            $table->string('slug')->uniqe();
            $table->string('console');
            $table->string('publisher');
            $table->string('publish_year');
            $table->string('publish_date');
            $table->string('publish_date_full');
            $table->string('img_url')->nullable();
            $table->string('fingerprint')->nullable();
            $table->string('wikipedia_url')->nullable();
            $table->text('description')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('games');
    }
}
