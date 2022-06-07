<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscribesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::dropIfExists('subscribes');
      
        Schema::create('subscribes', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('party_id');
          $table->unsignedBigInteger('user_id');
          $table->integer('status');
          $table->string('message');
          $table->timestamps();

          $table->index( 'user_id' );

          $table->foreign('user_id')
                ->references('id')
                ->on('users');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscribes');
    }
}
