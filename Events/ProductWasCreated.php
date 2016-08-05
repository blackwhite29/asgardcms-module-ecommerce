<?php

namespace Modules\Ecommerce\Events;

use Illuminate\Queue\SerializesModels;

class ProductWasCreated
{
    use SerializesModels;

	/**
	 * @var array
	 */
	public $data;
	/**
	 * @var int
	 */
	public $productId;

	/**
	 * @param $productId
	 * @param array $data
	 */
	public function __construct($productId, array $data)
    {
        //
	    $this->data = $data;
	    $this->$productId = $productId;
    }

}
