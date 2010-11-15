<?php 
	
	class cache_essence {
		
		/* Cache data */
		public static function set_cache($name, $data) {
			
			if(config_essence::get('enable_cache', 'chache')) {
			
				file_put_contents(config_essence::get('root_dir') . 'application/resource/cache/' . md5($name), serialize($data));
				
			}
			
		}
		
		/* Get data from cache */
		public static function get_cache($name) {
			
			if(config_essence::get('enable_cache', 'chache')) {
			
				return unserialize(@file_get_contents(config_essence::get('root_dir') . 'application/resource/cache/' . md5($name)));
				
			} else {
				
				return null;
				
			}
			
		}
		
		/* Remove cache data */
		public static function clear_cache($names) {
			
			if(config_essence::get('enable_cache', 'chache')) {
			
				foreach ($names as $name) {
					
					@unlink(config_essence::get('root_dir') . 'application/resource/cache/' . md5($name));
					
				}
				
			}
			
		}
		
	}
	
?>