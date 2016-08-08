<?php

namespace Modules\Ecommerce\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Ecommerce\Entities\Product;
use Modules\Ecommerce\Repositories\Cache\CacheEcommerceDecorator;
use Modules\Ecommerce\Repositories\Eloquent\EloquentEcommerceRepository;
use Modules\Tag\Repositories\TagManager;
use Illuminate\Support\Facades\Config;
class EcommerceServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
    }

    public function boot()
    {
	    $this->publishConfig('ecommerce', 'config');

        $this->publishConfig('ecommerce', 'permissions');
	    $this->app[TagManager::class]->registerNamespace(new Product());
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
	    $this->app->bind(
		    'Modules\Ecommerce\Repositories\EcommerceRepository',
		    function () {
			    $repository = new EloquentEcommerceRepository(new Product());

			    if (! Config::get('app.cache')) {
				    return $repository;
			    }

			    return new CacheEcommerceDecorator($repository);
		    }
	    );
    }
}
