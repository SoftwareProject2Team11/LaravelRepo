<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TrainingRequestFK extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Training_Requests', function (Blueprint $table) {
            //$table->foreign('trainingId')->references('trainingId')->on('Training');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Training_Requests', function (Blueprint $table) {
            //$table->dropForeign('Training_Requests_trainingId_foreign');
            $table->dropForeign('Training_Requests_user_id_foreign');
        });
    }
}
