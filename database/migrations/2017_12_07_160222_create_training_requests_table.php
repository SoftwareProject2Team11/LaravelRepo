<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Training_Requests', function (Blueprint $table) {
            $table->increments('requestId');
            $table->integer('trainingId')->unsigned();
            $table->string('trainingName');
            $table->longText('reason');
            $table->timestamps();
            $table->integer('user_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Training_Requests');
    }
}
