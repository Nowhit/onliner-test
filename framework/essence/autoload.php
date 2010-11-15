<?php
	
	class autoload_essence {
		
		/* Load class method */
		public static function load($class_name) {
			
			if(preg_match('|[\w]+_[\w]+|si', $class_name)) {
				
				list($file, $subdir) = split('_', $class_name);
				
				if(in_array($subdir, array('essence', 'library'))) {
					
					if(is_file(dirname($_SERVER['SCRIPT_FILENAME']) . '/framework/' . $subdir . '/' . $file . '.php')) {
					
						require_once(dirname($_SERVER['SCRIPT_FILENAME']) . '/framework/' . $subdir . '/' . $file . '.php');
						
					}
					
				} else {
				
					if(is_file(dirname($_SERVER['SCRIPT_FILENAME']) . '/application/' . $subdir . '/' . $file . '.php')) {
						
						require_once(dirname($_SERVER['SCRIPT_FILENAME']) . '/application/' . $subdir . '/' . $file . '.php');
						
					}
					
				}
				
			}
			
		}
		
	}
	
	/* Set autoload manager */
	spl_autoload_register(array('autoload_essence', 'load'));
	
?>