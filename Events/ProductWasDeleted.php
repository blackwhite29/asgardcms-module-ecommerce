<?php

namespace Modules\Ecommerce\Events;

use Illuminate\Queue\SerializesModels;

class ProductWasDeleted
{
    use SerializesModels;

    public $product;

	/**
	 * @param $product
	 */
	public function __construct($product)
    {
        //
	    $this->product=$product;
    }



}
