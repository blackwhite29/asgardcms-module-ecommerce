<?php

namespace Modules\Ecommerce\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateCategoryRequest extends BaseFormRequest
{
	protected $translationsAttributesKey = 'ecommerce::categories.validation.attributes';


	/**
	 * @return array
	 */
	public function rules(){
		return [];
	}

	/**
	 * @return array
	 */
	public function translationRules()
	{
		return [
			'name' => 'required',
			'slug' => 'required',
		];
	}

	/**
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * @return array
	 */
	public function translationMessages()
	{
		return [
			'name.required' => trans('ecommerce::messages.name is required'),
			'slug.required' => trans('ecommerce::messages.slug is required'),
		];
	}
}
