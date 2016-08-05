<?php

return [
// append
	'ecommerce.product' => [
		'index' => 'ecommerce::product.list resource',
		'create' => 'ecommerce::product.create resource',
		'edit' => 'ecommerce::product.edit resource',
		'destroy' => 'ecommerce::product.destroy resource',
	],
	'ecommerce.category' => [
		'index' => 'ecommerce::category.list resource',
		'create' => 'ecommerce::category.create resource',
		'edit' => 'ecommerce::category.edit resource',
		'destroy' => 'ecommerce::category.destroy resource',
	],
];
