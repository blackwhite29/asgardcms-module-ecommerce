<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_categories', function(Blueprint $table)
        {
            $table->increments('id');

            $table->timestamps();
        });
	    Schema::create('category_categories_translations', function(Blueprint $table)
	    {
		    $table->increments('id');
		    $table->integer('category_id')->unsigned();
		    $table->string('locale')->index();
		    $table->unique(['category_id', 'locale']);
		    $table->foreign('category_id')->references('id')->on('category_categories')->onDelete('cascade');
		    $table->string('parent');
		    $table->string('child');
		    $table->string('taxonomy',32);
		    $table->string('name');
		    $table->string('description');
		    $table->integer('priority');
		    $table->string('slug');
		    $table->string('thumb');
		    $table->text("metadata");
		    $table->timestamps();
	    });
	    Schema::create('product__products_category', function(Blueprint $table)
	    {
		    $table->integer('product_id')->unsigned();
		    $table->integer('category_id')->unsigned();
		    $table->foreign('product_id')->references('id')->on('product__product_translations')->onDelete('cascade');
		    $table->unique(['category_id', 'product_id']);
		    $table->foreign('category_id')->references('id')->on('category_categories_translations')->onDelete('cascade');
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('category_categories');
	    Schema::drop('category_categories_translations');
	    Schema::drop('product__products_category');
    }

}
