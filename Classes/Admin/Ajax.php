<?php

	namespace Crouton\Admin;

	use \Crouton\Contracts\AjaxListener;

	class Ajax extends AjaxListener{


		/**
		 * All backend-ajax events for this plugin
		 * 
		 * @return string, echoed
		 */
		public function listen(){


			/**
			 * Below are just some examples
			 */
			/*add_action( 'wp_ajax_actionName', function(){

				$this->setPostGlobal();


				die();

			});*/
		}
	}