<?php

	namespace Modules\Ecommerce\Sidebar;

	use Maatwebsite\Sidebar\Badge;
	use Maatwebsite\Sidebar\Group;
	use Maatwebsite\Sidebar\Item;
	use Maatwebsite\Sidebar\Menu;
	use Modules\Ecommerce\Repositories\EcommerceRepository;
	use Modules\User\Contracts\Authentication;

	class SidebarExtender implements \Maatwebsite\Sidebar\SidebarExtender
	{
		/**
		 * @var Authentication
		 */
		protected $auth;

		/**
		 * @param Authentication $auth
		 *
		 * @internal param Guard $guard
		 */
		public function __construct(Authentication $auth)
		{
			$this->auth = $auth;
		}

		/**
		 * @param Menu $menu
		 *
		 * @return Menu
		 */
		public function extendWith(Menu $menu)
		{
			$menu->group(trans('core::sidebar.content'), function (Group $group) {
				$group->item(trans('ecommerce::products.title.ecommerce'), function (Item $item) {
					$item->icon('fa fa-cart-plus');
					$item->weight(1);
					$item->badge(function (Badge $badge, EcommerceRepository $product) {
						$badge->setClass('bg-green');
						$badge->setValue($product->countAll());
					});

					$item->item(trans('ecommerce::products.title.products'), function (Item $item) {

						$item->route('admin.ecommerce.product.index');
						$item->icon('fa fa-cart-plus');
						$item->authorize(
							$this->auth->hasAccess('ecommerce.product.index')
						);
					});
					$item->item(trans('ecommerce::categories.title.categories'), function (Item $item) {
						$item->route('admin.ecommerce.category.index');
						$item->icon('fa fa-bars');
						$item->authorize(
							$this->auth->hasAccess('ecommerce.category.index')
						);
					});
				});
			});
			return $menu;
		}
	}
