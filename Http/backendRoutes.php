<?php

	use Illuminate\Routing\Router;

	$router->bind('ecommerce/product', function ($id) {
		return app(\Modules\Ecommerce\Repositories\EcommerceRepository::class)->find($id);
	});
	$router->bind('ecommerce/category', function ($id) {
		return app(\Modules\Ecommerce\Repositories\CategoryRepository::class)->find($id);
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
		$router->get('category', [
			'as' => 'admin.ecommerce.category.index',
			'uses' => 'CategoryController@index',
			'middleware' => 'can:ecommerce.category.index',
		]);
		$router->post('category', [
			'as' => 'admin.ecommerce.category.store',
			'uses' => 'CategoryController@store',
			'middleware' => 'can:ecommerce.category.create',
		]);
		$router->get('category/{category}/edit', [
			'as' => 'admin.ecommerce.category.edit',
			'uses' => 'CategoryController@edit',
			'middleware' => 'can:ecommerce.category.edit',
		]);
		$router->put('category/{category}/edit', [
			'as' => 'admin.ecommerce.category.update',
			'uses' => 'CategoryController@update',
			'middleware' => 'can:ecommerce.category.edit',
		]);
		$router->delete('category/{category}', [
			'as' => 'admin.ecommerce.category.destroy',
			'uses' => 'CategoryController@destroy',
			'middleware' => 'can:ecommerce.category.destroy',
		]);
		$router->get('category/create', [
			'as' => 'admin.ecommerce.category.create',
			'uses' => 'CategoryController@create',
			'middleware' => 'can:ecommerce.category.create',
		]);
	});
