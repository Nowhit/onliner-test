<?php
	
	class pre_filter_application {
		
		public static function run() {
			
			$me = session_essence::get('me');
			
			view_essence::assign('me', $me);
			
		}
		
	}
	
?>