<?php

namespace Modules\Ecommerce\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
	protected $table='product__product_translations';
    protected $fillable = [
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
}
