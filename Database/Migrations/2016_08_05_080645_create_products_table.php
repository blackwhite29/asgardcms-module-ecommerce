<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product__products', function(Blueprint $table)
        {
	        $table->engine = 'InnoDB';
            $table->increments('id');
	        $table->string("model",50);
            $table->timestamps();
        });
	    Schema::create('product__product_translations', function(Blueprint $table)
	    {
		    $table->engine = 'InnoDB';
		    $table->increments('id');
		    $table->integer('product_id')->unsigned();
		    $table->string('locale')->index();
		    $table->unique(['product_id', 'locale']);
		    $table->foreign('product_id')->references('id')->on('product__products')->onDelete('cascade');
		    $table->string('title');
		    $table->string('slug');
		    $table->decimal("price");
		    $table->decimal("sale_price");
		    $table->text("short_description");
			$table->integer("manufacturer_id")->unsigned()->nullable();
		    $table->foreign('manufacturer_id')->references('id')->on('manufacturer_translations');
		    $table->text('content');
		    $table->string("image");
		    $table->text("album");
		    $table->string('meta_title')->nullable();
		    $table->string('meta_description')->nullable();
		    $table->string('og_title')->nullable();
		    $table->string('og_description')->nullable();
		    $table->string('og_image')->nullable();
		    $table->string('og_type')->nullable();
		    $table->boolean('status')->default(1);
		    $table->enum("allow_purchase",['disallowandtext','disallow','allow']);
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
        Schema::drop('product__products');
	    Schema::drop('product__product_translations');
    }

}
