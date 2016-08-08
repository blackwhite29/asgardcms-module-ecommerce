<?php

namespace Modules\Ecommerce\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Ecommerce\Http\Requests\CreateCategoryRequest;
use Modules\Ecommerce\Repositories\CategoryRepository;

class CategoryController extends AdminBaseController
{

	private $category;

	/**
	 * @param CategoryRepository $category
	 */
	public function __construct(CategoryRepository $category){
		parent::__construct();
		$this->category = $category;
		$this->assetPipeline->requireCss('icheck.blue.css');
	}
	/**
     * Display a listing of the resource.
     * @return Response
     */

    public function index()
    {
	    $categories = $this->category->all();


        return view('ecommerce::admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
	    $categories = $this->category->lists(['id','name']);
        return view('ecommerce::admin.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  CreateCategoryRequest $request
     * @return Response
     */
    public function store(CreateCategoryRequest $request)
    {
	    Log::info(json_encode($request->all()));
	  //$this->category->create($request->all());
	    return redirect()->route('admin.ecommerce.category.index')
		    ->withSuccess(trans('ecommerce::messages.category created'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('ecommerce::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
