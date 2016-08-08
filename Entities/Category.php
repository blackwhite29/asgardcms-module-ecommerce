<?php

namespace Modules\Ecommerce\Entities;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Traits\NamespacedEntity;


class Category extends Model
{
	use Translatable, NamespacedEntity;
	protected $table='category_categories';
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
	public $translatedAttributes = [
		'category_id',
		'parent',
		'child',
		'taxonomy',
		'name',
		'description',
		'priority',
		'slug',
		'metadata',

	];
	protected static $entityNamespace = 'asgardcms/ecommerce';
	public function __call($method, $parameters)
	{
		#i: Convert array to dot notation
		$config = implode('.', ['asgard.ecommerce.category.relations', $method]);

		#i: Relation method resolver
		if (config()->has($config)) {
			$function = config()->get($config);

			return $function($this);
		}

		#i: No relation found, return the call to parent (Eloquent) to handle it.
		return parent::__call($method, $parameters);
	}
}
