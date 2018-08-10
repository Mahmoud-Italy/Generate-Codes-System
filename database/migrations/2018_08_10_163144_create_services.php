<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('comp_id')->unsigned();
            $table->integer('scope_id')->unsigned();
            $table->string('name');
            $table->string('digit');
            $table->integer('sort');
            $table->tinyInteger('status');
            $table->timestamps();
        });

        Schema::table('services', function(Blueprint $table)
        {
            $table->foreign('comp_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');    
        });

        Schema::table('services', function(Blueprint $table)
        {
            $table->foreign('scope_id')->references('id')->on('scopes')->onDelete('cascade')->onUpdate('cascade');    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services', function(Blueprint $table)
        {
            $table->dropForeign('services_comp_id_foreign');
        });
        Schema::table('services', function(Blueprint $table)
        {
            $table->dropForeign('services_scope_id_foreign');
        });
        Schema::drop('services');
    }
}
