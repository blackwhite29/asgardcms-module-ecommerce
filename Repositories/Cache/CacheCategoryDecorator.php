<?php

namespace Modules\Ecommerce\Repositories\Cache;

use Modules\Core\Repositories\Cache\BaseCacheDecorator;
use Modules\Ecommerce\Repositories\CategoryRepository;
use Modules\Ecommerce\Repositories\EcommerceRepository;


class CacheCategoryDecorator extends BaseCacheDecorator implements CategoryRepository
{

    protected $repository;

	/**
	 * @param CategoryRepository $category
	 */
	public function __construct(CategoryRepository $category)
    {
        parent::__construct();
        $this->entityName = 'category';
        $this->repository = $category;
    }

    /**
     * Find the page set as homepage
     *
     * @return object
     */


    /**
     * Count all records
     * @return int
     */
    public function countAll()
    {
        return $this->cache
            ->tags($this->entityName, 'global')
            ->remember("{$this->locale}.{$this->entityName}.countAll", $this->cacheTime,
                function () {
                    return $this->repository->countAll();
                }
            );
    }

    /**
     * @param $slug
     * @param $locale
     * @return object
     */
    public function findBySlugInLocale($slug, $locale)
    {
        return $this->cache
            ->tags($this->entityName, 'global')
            ->remember("{$this->locale}.{$this->entityName}.findBySlugInLocale.{$slug}.{$locale}", $this->cacheTime,
                function () use ($slug, $locale) {
                    return $this->repository->findBySlugInLocale($slug, $locale);
                }
            );
    }
}
