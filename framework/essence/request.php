<?php 
	
	class request_essence {
		
		/* Url request */
		protected static $url_request;
		
		/* Current request */
		protected static $current_request;
		
		/* Initialize request */
		public static function init() {
			
			/* Set url request */
			self::set_url_request(self::get_request_from_url(self::get_url()));
			
			/* Set current request from url request */
			self::set_current_request(self::get_url_request());
			
			/* Set current request from application configuration */
			if($redirect_rules = config_essence::get('redirect_rules', 'request')) {
				
				foreach ($redirect_rules as $redirect_expression => $redirect_replace) {
					
					$request = preg_replace('|^' . preg_quote(config_essence::get('root_url'), '|') . '|', '', self::get_url());
					
					$new_request = preg_replace('|^' . str_replace('|','\|',$redirect_expression) . '$|si', $redirect_replace, $request);
						
					if($new_request != $request) {
						
						self::set_current_request(self::get_request_from_url(config_essence::get('root_url') . $new_request));
						
						break;
						
					}
					
				}
				
			} 
			
		}
		
		/* Get url string */
		public static function get_url() {
			
			return urldecode(
				
				strtolower(
				
					'http://' . 
					
					data_essence::get('server', 'HTTP_HOST') . 
					
					preg_replace(
					
						'|^(.*?)&(.*?)$|si',
						
						'$1',
						
						preg_replace(
							
							'|' . preg_quote(config_essence::get('url_suffics', 'request'), '|') . '$|si', 
								
							'', 
							
							str_replace(
								
								'?' . data_essence::get('server', 'QUERY_STRING'), 
								
								'', 
								
								data_essence::get('server', 'REQUEST_URI')
								
							)
								
						)
						
					)
					
				)
				
			);
			
		}
		
		/*  */
		public static function get_url_type($url) {
			
			return preg_match('|(.*?)\/$|si', $url);
			
		}
		
		/* Get request from url string */
		public static function get_request_from_url($url) {
			
			/* Initialize request by default values */
			$request = array(
				
				'action' => config_essence::get('default_action', 'request'),
				
				'method' => config_essence::get('default_method', 'request'),
				
				'params' => array()
				
			);
			
			/* Get query string */
			$query = preg_replace('|/$|', '', preg_replace('|^' . preg_quote(config_essence::get('root_url'), '|') . '|', '', $url));
			
			/* Does query contain anything? */
			if(!empty($query)) {
				
				/* Divide query into segments */
				$segments = array_map('trim', preg_split('|/|', $query, -1, PREG_SPLIT_NO_EMPTY));
				
				/* Get request action */
				if(!empty($segments[0])) {
					
					$request['action'] = $segments[0];
					
					/* Get request method */
					if(!empty($segments[1])) {
						
						$request['method'] = $segments[1];
						
						/* Get request parameters */
						for ($i=2; $i<count($segments); $i++) {
								
							$request['params'][] = $segments[$i];
								
						}
						
					}
					
				}
				
			}
			
			/* Return request */
			return $request;
			
		}
		
		/* Get url request */
		public static function get_url_request() {
			
			return array(
				
				'action' => self::get_url_request_action(),
				
				'method' => self::get_url_request_method(),
				
				'params' => self::get_url_request_params()
					
			);
			
		}
		
		/* Get url request action */
		public static function get_url_request_action() {
			
			return (isset(self::$url_request['action']) and is_string(self::$url_request['action'])) ? self::$url_request['action'] : null;
			
		}
		
		/* Get url request method */
		public static function get_url_request_method() {
			
			return (isset(self::$url_request['method']) and is_string(self::$url_request['method'])) ? self::$url_request['method'] : null;
			
		}
		
		/* Get url request params */
		public static function get_url_request_params() {
			
			return (isset(self::$url_request['params']) and is_array(self::$url_request['params'])) ? self::$url_request['params'] : array();
			
		}
		
		/* Set url request */
		protected static function set_url_request($request) {
			
			if(isset($request['action']) and is_string($request['action']) and isset($request['method']) and is_string($request['method'])  and isset($request['params']) and is_array($request['params'])) {
			
				self::$url_request = $request;
				
			}
			
		}
		
		/* Get current request */
		public static function get_current_request() {
			
			return array(
				
				'action' => self::get_current_request_action(),
				
				'method' => self::get_current_request_method(),
				
				'params' => self::get_current_request_params()
					
			);
			
		}
		
		/* Get current request action */
		public static function get_current_request_action() {
			
			return (isset(self::$current_request['action']) and is_string(self::$current_request['action'])) ? self::$current_request['action'] : null;
			
		}
		
		/* Get current request method */
		public static function get_current_request_method() {
			
			return (isset(self::$current_request['method']) and is_string(self::$current_request['method'])) ? self::$current_request['method'] : null;
			
		}
		
		/* Get current request params */
		public static function get_current_request_params() {
			
			return (isset(self::$current_request['params']) and is_array(self::$current_request['params'])) ? self::$current_request['params'] : array();
			
		}
		
		/* Set current request */
		protected static function set_current_request($request) {
			
			if(isset($request['action']) and is_string($request['action']) and isset($request['method']) and is_string($request['method'])  and isset($request['params']) and is_array($request['params'])) {
			
				self::$current_request = $request;
				
			}
			
		}
		
		/* Set current request action */
		protected static function set_current_request_action($request_action) {
			
			if(is_string($request_action)) {
				
				self::$current_request['action'] = $request_action;
				
			}
			
		}
		
		/* Set current request method */
		protected static function set_current_request_method($request_method) {
			
			if(is_string($request_method)) {
			
				self::$current_request['method'] = $request_method;
				
			}
			
		}
		
		/* Set current request params */
		protected static function set_current_request_params($request_params) {
			
			if(is_array($request_params)) {
			
				self::$current_request['params'] = $request_params;
				
			}
			
		}
		
		public static function load_request($request_action = '', $request_method = '', $request_params = array()) {
			
			$url = config_essence::get('root_url');

			if($request_action && $request_method) {
				
				$url .= $request_action . '/' . $request_method . '/' . (sizeof($request_params) > 0 ? join('/', $request_params) : '');
				
			}
			
			header('location: ' . $url);
			
		}
		
	}
	
?>