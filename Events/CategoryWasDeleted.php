<?php

namespace Modules\Ecommerce\Events;

use Illuminate\Queue\SerializesModels;

class CategoryWasDeleted
{
    use SerializesModels;

    public $category;

	/**
	 * @param $category
	 */
	public function __construct($category)
    {
        //
	    $this->category=$category;
    }



}
