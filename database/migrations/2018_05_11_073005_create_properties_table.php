<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uid')->unique();
            $table->string('listingname');
            $table->string('agent');
            $table->string('agentemail')->unique();
            $table->string('clientemail')->unique();
            $table->string('propertyaddress');
            $table->integer('facebook');
            $table->integer('twitter');
            $table->integer('instagram');
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
        Schema::dropIfExists('properties');
    }
}
