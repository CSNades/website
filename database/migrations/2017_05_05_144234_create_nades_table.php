<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('map_id')->unsigned()->default(1);
            $table->foreign('map_id')->references('id')->on('maps');
            // $table->integer('pop_spot_id')->unsigned();
            // $table->foreign('pop_spot_id')->references('id')->on('pop_spots');
            $table->integer('user_id')->unsigned()->default(1);
            $table->foreign('user_id')->references('id')->on('users');
            $table->enum('type', array('fire', 'flash', 'frag', 'smoke'));
            $table->enum('pop_spot', array('a-site', 'b-site', 'mid', 'other'));
            $table->string('title');
            $table->string('imgur_album')->nullable();
            // $table->string('imgur_gifv');
            $table->string('youtube')->nullable();
            $table->boolean('is_working');
            $table->string('tags');
            $table->integer('approved_by')->unsigned()->nullable();
            $table->foreign('approved_by')->references('id')->on('users');
            $table->timestamp('approved_at')->nullable();
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
        Schema::dropIfExists('nades');
    }
}
