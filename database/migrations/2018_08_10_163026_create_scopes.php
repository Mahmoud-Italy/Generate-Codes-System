<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScopes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scopes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('comp_id')->unsigned();
            $table->tinyInteger('category');
            $table->string('scope',150);
            $table->integer('sort');
            $table->tinyInteger('status');
            $table->timestamps();
        });

        Schema::table('scopes', function(Blueprint $table)
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
        Schema::table('scopes', function(Blueprint $table)
        {
            $table->dropForeign('scopes_comp_id_foreign');
        });
        Schema::drop('scopes');
    }
}
