<?php

	namespace Modules\Ecommerce\Providers;

	use Illuminate\Support\Facades\Config;
	use Illuminate\Support\ServiceProvider;
	use Modules\Core\Traits\CanPublishConfiguration;
	use Modules\Ecommerce\Entities\Category;
	use Modules\Ecommerce\Repositories\Cache\CacheCategoryDecorator;
	use Modules\Ecommerce\Repositories\Eloquent\EloquentCategoryRepository;

	class CategoryServiceProvider extends ServiceProvider
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
			//
			$this->registerBindings();
		}

		public function boot()
		{
			$this->publishConfig('ecommerce', 'category');
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
				'Modules\Ecommerce\Repositories\CategoryRepository',
				function () {
					$repository = new EloquentCategoryRepository(new Category());

					if (!Config::get('app.cache')) {
						return $repository;
					}

					return new CacheCategoryDecorator($repository);
				}
			);

		}
	}
