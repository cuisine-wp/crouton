<?php

	namespace Crouton\Admin;

	use \Cuisine\Wrappers\Metabox;
	use \Cuisine\Wrappers\Field;
	use \Crouton\Contracts\EventListener;

	class Metaboxes extends EventListener{


		/**
		 * Creates the metaboxes for this plugin
		 * 
		 * @return void
		 */
		public function listen(){

			$fields = $this->getFields();
			Metabox::make( 'A Metabox', array( 'post', 'page', 'project' ) )->set( $fields );

		}

		/**
		 * Gets the fields for our metabox
		 * 
		 * @return array
		 */
		protected function getFields(){

			return array(

				Field::media( 
					'images', 					//id
					'Afbeeldingen',				//Label
					array(
						'label' 				=> 'top',		//display Label
						'defaultValue'			=> array()
					)
				)
				
			);

		}
	}
