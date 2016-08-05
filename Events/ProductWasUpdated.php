<?php

namespace Modules\Ecommerce\Events;

use Illuminate\Queue\SerializesModels;

class ProductWasUpdated
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
	 * @param array $data
	 * @param $productId
	 */
	public function __construct(array $data,$productId)
    {
        //

	    $this->data = $data;
	    $this->productId = $productId;
    }


}
