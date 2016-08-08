<?php

namespace Modules\Ecommerce\Events;

use Illuminate\Queue\SerializesModels;

class CategoryWasCreated
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
	 * @param $categoryId
	 * @param array $data
	 */
	public function __construct($categoryId, array $data)
    {
        //
	    $this->data = $data;
	    $this->categoryId = $categoryId;
    }

}
