<?php

namespace Modules\Ecommerce\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Traits\NamespacedEntity;
use Modules\Tag\Contracts\TaggableInterface;
use Modules\Tag\Traits\TaggableTrait;

class Product extends Model implements TaggableInterface
{
	use Translatable, TaggableTrait, NamespacedEntity;
	protected $table='product__products';

	public $translatedAttributes = [
		'product_id',
		'title',
		'slug',
		'price',
		'sale_price',
		'short_description',
		'manufacturer_id',
		'content',
		'image',
		'album',
		'meta_title',
		'meta_description',
		'og_title',
		'og_description',
		'og_image',
		'og_type',
		'status',
		'allow_purchase',

	];
	protected $fillable = [
		'model',
		'product_id',
		'title',
		'slug',
		'price',
		'sale_price',
		'short_description',
		'manufacturer_id',
		'content',
		'image',
		'album',
		'meta_title',
		'meta_description',
		'og_title',
		'og_description',
		'og_image',
		'og_type',
		'status',
		'allow_purchase',
	];
	protected static $entityNamespace = 'asgardcms/ecommerce';
	public function __call($method, $parameters)
	{
		#i: Convert array to dot notation
		$config = implode('.', ['asgard.ecommerce.config.relations', $method]);

		#i: Relation method resolver
		if (config()->has($config)) {
			$function = config()->get($config);

			return $function($this);
		}

		#i: No relation found, return the call to parent (Eloquent) to handle it.
		return parent::__call($method, $parameters);
	}
}
