<?php

namespace Modules\Ecommerce\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Builder;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Modules\Ecommerce\Events\ProductWasDeleted;
use Modules\Ecommerce\Events\ProductWasCreated;
use Modules\Ecommerce\Events\ProductWasUpdated;
use Modules\Ecommerce\Repositories\EcommerceRepository;


class EloquentEcommerceRepository extends EloquentBaseRepository implements EcommerceRepository
{
    /**
     * Find the page set as homepage
     * @return object
     */


    /**
     * Count all records
     * @return int
     */
    public function countAll()
    {
        return $this->model->count();
    }

    /**
     * @param  mixed  $data
     * @return object
     */
    public function create($data)
    {

        $product = $this->model->create($data);

        event(new ProductWasCreated($product->id, $data));

	    $product->setTags(array_get($data, 'tags', []));

        return $product;
    }

    /**
     * @param $model
     * @param  array  $data
     * @return object
     */
    public function update($model, $data)
    {

        $model->update($data);

        event(new ProductWasUpdated($model->id, $data));

        $model->setTags(array_get($data, 'tags', []));

        return $model;
    }

    public function destroy($product)
    {
	    $product->untag();

        event(new ProductWasDeleted($product));

        return $product->delete();
    }

    /**
     * @param $slug
     * @param $locale
     * @return object
     */
    public function findBySlugInLocale($slug, $locale)
    {
        if (method_exists($this->model, 'translations')) {
            return $this->model->whereHas('translations', function (Builder $q) use ($slug, $locale) {
                $q->where('slug', $slug);
                $q->where('locale', $locale);
            })->with('translations')->first();
        }

        return $this->model->where('slug', $slug)->where('locale', $locale)->first();
    }

    /**
     * Set the current page set as homepage to 0
     * @param null $pageId
     */

}
