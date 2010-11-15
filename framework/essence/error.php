<?php
	
	class error_essence {

		/* Initialize error handler */
		public static function init() {
			
			/* Set error reporting rate */
			error_reporting(E_ALL | E_STRICT);
			
			/* Set error handler */
			set_error_handler(array('error_essence', 'debug'));
			
		}
		
		/* Debug error */
		public static function debug($errno, $errstr, $errfile, $errline) {
			
			/* Show error */
			if(config_essence::get('show_errors', 'error')) {
				
				view_essence::assign('errno', $errno);
				
				view_essence::assign('errstr', $errstr);
				
				view_essence::assign('errfile', $errfile);
				
				view_essence::assign('errline', $errline);
				
				view_essence::display('debug', 'framework/template/');
				
			}
			
			/* Log error */
			if(config_essence::get('log_errors', 'error')) {
				
				file_put_contents('errors.txt',
				
					@file_get_contents('errors.txt') .
					
					date("Y-m-d H:i:s") . "\r\n" .
					
					'Error: ' . $errno . "\r\n" .
					
					'Message: ' . $errstr . "\r\n" .
					
					'File: ' . $errfile . "\r\n" .
					
					'Line: ' . $errline . "\r\n\r\n"
					
				);
				
			}
			
			/* Return true to disable default error handler */
			return true;
			
		}
		
	}
	
?>