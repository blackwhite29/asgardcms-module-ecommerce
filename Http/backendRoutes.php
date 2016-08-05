<?php

	use Illuminate\Routing\Router;

	$router->bind('ecommerce', function ($id) {
		return app(\Modules\Ecommerce\Repositories\EcommerceRepository::class)->find($id);
	});
	$router->group(['prefix' => '/ecommerce'], function (Router $router) {
		$router->get('product', [
			'as' => 'admin.ecommerce.product.index',
			'uses' => 'ProductController@index',
			'middleware' => 'can:ecommerce.product.index',
		]);
		$router->get('product/create', [
			'as' => 'admin.ecommerce.product.create',
			'uses' => 'ProductController@create',
			'middleware' => 'can:ecommerce.product.create',
		]);
		$router->post('product', [
			'as' => 'admin.ecommerce.product.store',
			'uses' => 'ProductController@store',
			'middleware' => 'can:ecommerce.product.create',
		]);
		$router->get('product/{product}/edit', [
			'as' => 'admin.ecommerce.product.edit',
			'uses' => 'ProductController@edit',
			'middleware' => 'can:ecommerce.product.edit',
		]);
		$router->put('product/{product}/edit', [
			'as' => 'admin.ecommerce.product.update',
			'uses' => 'ProductController@update',
			'middleware' => 'can:ecommerce.product.edit',
		]);
		$router->delete('product/{product}', [
			'as' => 'admin.ecommerce.product.destroy',
			'uses' => 'ProductController@destroy',
			'middleware' => 'can:ecommerce.product.destroy',
		]);
	});
