<?php

namespace Modules\Ecommerce\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Ecommerce\Entities\Product;
use Modules\Ecommerce\Repositories\EcommerceRepository;
class ProductController extends AdminBaseController
{

		private $product;

	/**
	 * @param EcommerceRepository $product
	 */
	public function __construct(EcommerceRepository $product){
		parent::__construct();
		$this->product = $product;
		$this->assetPipeline->requireCss('icheck.blue.css');
	}
    public function index()
    {
	    $products = $this->product->all();
        return view('ecommerce::admin.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('ecommerce::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
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
