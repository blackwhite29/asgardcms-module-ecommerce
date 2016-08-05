<?php
	/*
	 * Copyright 2014 BMS GROUPS GLOBAL
	 * SĐT : 097 715 9966
	 * Yahoo : uhm_taong0k
	 * Skyper : sonlh.bkap91
	 * Website : http://sonngoc.info
	 * Project : FacebookAz
	 */
	namespace Modules\Ecommerce\Repositories;
	use Modules\Core\Repositories\BaseRepository;
	interface EcommerceRepository extends BaseRepository
	{

		/**
		 * Count all records
		 *
		 * @return int
		 */
		public function countAll();

		/**
		 * @param $slug
		 * @param $locale
		 *
		 * @return object
		 */
		public function findBySlugInLocale($slug, $locale);
	}
