<?php 
	
	class filter_essence {
		
		/* Initialize filter */
		public static function init($type) {
			
			/* Run application filter */
			if(config_essence::get('enable_' . $type . '_filter', 'filter')) {
			
				if(class_exists($type . '_filter_application')) {
					
					if(method_exists($type . '_filter_application', 'run')) {
						
						call_user_func_array(array($type . '_filter_application', 'run'), array());
						
					} else {
						
						trigger_error('Method run of filter class ' . $type . '_filter_application does not exist');
						
					}
					
				} else {
					
					trigger_error('Filter class ' . $type . '_filter_application does not exist');
					
				}
				
			}
			
		}
				
	}

?>