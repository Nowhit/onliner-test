<?php
	
	class session_essence {
		
		/* Initialize session manager */
		public static function init() {
			
			/* Run session */
			session_start();
			
		}
		
		public static function get($key) {
			
			return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
			
		}
		
		public static function set($key, $value) {
			
			if(isset($_SESSION[$key])) {
				
				unset($_SESSION[$key]);
				
			}
			
			$_SESSION[$key] = $value;
			
		}
		
		public static function clear($key) {
			
			if(isset($_SESSION[$key])) {
				
				unset($_SESSION[$key]);
				
			}
			
		}
		
	}
	
?>