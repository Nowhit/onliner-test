<?php 
	
	class config_essence {
		
		/* Configuration */
		protected static $config = array();
		
		/* Initilize configuration */
		public static function init() {
			
			/* Set root url */
			self::set('root_url', 'http://' . data_essence::get('server', 'HTTP_HOST') . str_replace(data_essence::get('server', 'DOCUMENT_ROOT'), '', dirname(data_essence::get('server', 'SCRIPT_FILENAME'))) . '/');
			
			/* Set root dir */
			self::set('root_dir', dirname(data_essence::get('server', 'SCRIPT_FILENAME')) . '/');
			
		}
		
		/* Get configuration */
		public static function get($key, $application_config = null) {
			
			/* Is it configuration of application? */
			if($application_config) {
				
				/* Get configuration from application */
				$config = property_exists($application_config . '_config_application', $key) ? eval('return ' . $application_config . '_config_application::$' . $key . ';') : null;
				
			} else {
				
				/* Get configuration from framework */
				$config = isset(self::$config[$key]) ? self::$config[$key] : null;
				
			}
			
			/* Return configuration */
			return $config;
			
		}
		
		/* Set configuration */
		public static function set($key, $value) {
			
			/* Set configuration to framework */
			self::$config[$key] = $value;
			
		}
		
	}

?>