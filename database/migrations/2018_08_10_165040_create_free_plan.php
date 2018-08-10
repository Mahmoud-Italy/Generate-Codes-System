<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFreePlan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('free_plan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('comp_id')->unsigned();
            $table->string('code');
            $table->Date('at_date');
            $table->timestamps();
        });

        Schema::table('free_plan', function(Blueprint $table)
        {
            $table->foreign('comp_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('free_plan', function(Blueprint $table)
        {
            $table->dropForeign('free_plan_comp_id_foreign');
        });
        Schema::drop('free_plan');
    }
}
