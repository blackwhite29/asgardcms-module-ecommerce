<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManufacturerTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manufacturer', function(Blueprint $table)
        {
            $table->increments('id');

            $table->timestamps();
        });
	    Schema::create('manufacturer_translations', function(Blueprint $table)
	    {
		    $table->increments('id');
		    $table->integer('manufacturer_id')->unsigned();
		    $table->string('locale')->index();
		    $table->string('title');
		    $table->string('slug');
		    $table->string("image");
		    $table->text("description");
		    $table->timestamps();
		    $table->unique(['manufacturer_id', 'locale']);
		    $table->foreign('manufacturer_id')->references('id')->on('manufacturer')->onDelete('cascade');
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('manufacturer');
	    Schema::drop('manufacturer_translations');
    }

}
