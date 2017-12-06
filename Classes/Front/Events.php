<?php

	namespace Crouton\Front;

	use \Cuisine\Utilities\Url;
	use \Cuisine\Wrappers\Route;
	use \Cuisine\Wrappers\PostType;
	use \Crouton\Contracts\EventListener;

	class Events extends EventListener{


		/**
		 * Listen to front-end events
		 * 
		 * @return void
		 */
		public function listen(){

			/**
			 * Below are just some examples
			 */
			add_action( 'init', function(){

				//add a post-type
				//PostType::make( 'project', 'Projecten', 'Project' )->set();
				
				/**
				 * post_type, overview + detail
				 *
				 * Url on overview: {site_url}/ons-werk
				 * Url on detail: {site_url}/project/{post_name}
				 */
				//Route::url( 'project', 'ons-werk', 'project' );

				/**
				 * post_type, overview + detail
				 *
				 * Template on overview: templates/projects.php
				 * Template on detail: templates/project.php
				 */
				//Route::template( 'project', 'projects', 'project' );


			});
		}
	}
