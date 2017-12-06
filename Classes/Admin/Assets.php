<?php

	namespace Crouton\Admin;

	use \Cuisine\Utilities\Url;
	use \Crouton\Contracts\AssetLoader;

	class Assets extends AssetLoader{

		/**
		 * Enqueue scripts & Styles
		 * 
		 * @return void
		 */
		public function load(){

			/**
			 * Below are just some examples
			 */
			add_action( 'admin_menu', function(){

				//$url = Url::plugin( 'crouton', true ).'Assets';

				//enqueue a script
				//wp_enqueue_script( 'crouton_admin', $url.'/js/Admin.js' );

				//enqueue a stylesheet:
				//wp_enqueue_style( 'crouton_style', $url, '/css/admin.css' );
				
			});
		}
	}