<?php

	namespace Crouton\Admin;

	use \Cuisine\Utilities\Url;
    use \Crouton\Contracts\EventListener;
    use \Crouton\Facades\Example;

	class Events extends EventListener{

		/**
		 * Listen for admin events
		 * 
		 * @return void
		 */
		public function listen(){

			add_action( 'admin_init', function(){
				
                //do something
                
			});

		}
	}
