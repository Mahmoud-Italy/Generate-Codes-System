<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenerates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('comp_id')->unsigned();
            $table->string('scope_arr');
            $table->decimal('price',9,2);
            $table->string('notes')->nullable();
            $table->Date('at_date');
            $table->tinyInteger('status');
            $table->timestamps();
        });

        Schema::table('generates', function(Blueprint $table)
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
        Schema::table('generates', function(Blueprint $table)
        {
            $table->dropForeign('generates_comp_id_foreign');
        });
        Schema::drop('generates');
    }
}
