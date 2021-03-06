<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMaterielsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiels', function(Blueprint $table) {
            $table->increments('id');
            $table->string('libelle');
			$table->string('capacite');
			$table->integer('idTypeMat');
			$table->integer('idUnite');
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
        Schema::drop('materiels');
    }

}
