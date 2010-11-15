<?php 
	
	class view_essence {
		
		public static $variables = array();
		
		/* Assign template variable */
		public static function assign($variable, $value) {
			
			self::$variables[$variable] = $value;
			
		}
		
		/* Display template */
		public static function display($resource_name, $path = 'application/view/template/') {
			
			/* Extract variables */
			extract(self::$variables, EXTR_OVERWRITE);
			
			/* Display template */
			if(is_file(config_essence::get('root_dir') . $path . $resource_name . '.php')) {
			
				include_once(config_essence::get('root_dir') . $path . $resource_name . '.php');
				
			} else {
				
				trigger_error('File ' . config_essence::get('root_dir') . $path . $resource_name . '.php' . ' does not exist');
				
			}
			
		}
		
		/* Get template */
		public static function fetch($resource_name, $path = 'application/view/template/') {
			
			/* Extract variables */
			extract(self::$variables, EXTR_OVERWRITE);
			
			/* Fetch template */
			if(is_file(config_essence::get('root_dir') . $path . $resource_name . '.php')) {
				
				ob_start();
				
				include_once(config_essence::get('root_dir') . $path . $resource_name . '.php');
				
				return ob_get_clean();
				
			} else {
				
				trigger_error('File ' . config_essence::get('root_dir') . $path . $resource_name . '.php' . ' does not exist');
				
			}
			
		}
		
	}
	
?>