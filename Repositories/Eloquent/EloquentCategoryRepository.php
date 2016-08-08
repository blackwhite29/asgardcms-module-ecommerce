<?php

namespace Modules\Ecommerce\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Builder;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Modules\Ecommerce\Events\CategoryWasCreated;
use Modules\Ecommerce\Events\CategoryWasDeleted;
use Modules\Ecommerce\Events\CategoryWasUpdated;
use Modules\Ecommerce\Repositories\CategoryRepository;



class EloquentCategoryRepository extends EloquentBaseRepository implements CategoryRepository
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

	    $date_request=array();
	    foreach($data as $value){

	    }
        $category = $this->model->create($data);

        event(new CategoryWasCreated($category->id, $data));
        return $category;
    }

    /**
     * @param $model
     * @param  array  $data
     * @return object
     */
    public function update($model, $data)
    {

        $model->update($data);

        event(new CategoryWasUpdated($model->id, $data));

        return $model;
    }

    public function destroy($category)
    {


        event(new CategoryWasDeleted($category));

        return $category->delete();
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



}
