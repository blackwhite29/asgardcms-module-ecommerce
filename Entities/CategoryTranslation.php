<?php

namespace Modules\Ecommerce\Entities;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
	protected $table='category_categories_translations';
	protected $fillable = [
		'category_id',
		'parent',
		'child',
		'taxonomy',
		'name',
		'description',
		'priority',
		'slug',
		'thumb',
		'metadata',
	];
}
