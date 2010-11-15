<?php 
	
	class action_essence {
		
		/* Initialize action */
		public static function init() {
			
			/* Run application action */
			if(class_exists(request_essence::get_current_request_action() . '_action')) {
				
				if(method_exists(request_essence::get_current_request_action() . '_action', request_essence::get_current_request_method())) {
					
					return call_user_func_array(array(request_essence::get_current_request_action() . '_action', request_essence::get_current_request_method()), request_essence::get_current_request_params());
					
				} else {
					
					trigger_error('Method ' . request_essence::get_current_request_method() . ' of class ' . request_essence::get_current_request_action() . ' does not exist');
					
				}
				
			} else {
				
				trigger_error('Class ' . request_essence::get_current_request_action() . ' does not exist');
				
			}
			
		}
		
	}
	
?>