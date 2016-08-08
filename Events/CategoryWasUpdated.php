<?php

namespace Modules\Ecommerce\Events;

use Illuminate\Queue\SerializesModels;

class CategoryWasUpdated
{
    use SerializesModels;

	/**
	 * @var array
	 */
	public $data;
	/**
	 * @var int
	 */
	public $categoryId;

	/**
	 * @param array $data
	 * @param $categoryId
	 */
	public function __construct(array $data,$categoryId)
    {
        //

	    $this->data = $data;
	    $this->categoryId = $categoryId;
    }


}
