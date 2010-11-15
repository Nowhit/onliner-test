<?php
	
	class user_model {
		
		/* Manage object functions */
		public static function add_user(user_object $user) {
			
			$sql = "INSERT INTO 
							
							`users`(
								
								`user_login`,
																
								`user_password`,
								
								`user_email`,
								
								`user_signin_datetime`
								
							) 
							
							VALUES(
								
								" . database_essence::prepare($user->get_login()) . ",
								
								" . database_essence::prepare($user->get_password()) . ",
								
								" . database_essence::prepare($user->get_email()) . ",
								
								NOW()
								
							)";
			
			if($user_id = database_essence::insert($sql, 'users')) {
				
				return $user_id;
				
			}
			
			return null;
			
		}
		
		/* Get object functions */
		public static function get_users($params = array()) {
			
			$sql = "SELECT 
								
								`user_id` 
								
							FROM 
								
								`users`
								
							WHERE
							
								`user_id` > 0
								
							";
			
			if(isset($params['orders'])) {
				
				$subsql = "";
				
				foreach($params['orders'] as $order_key => $order_value) {
					
					switch ($order_key) {
						
						case 'user_signin_datetime':
							
							$subsql .= $subsql == ""? "" : ", ";
							
							$subsql .= "`user_signin_datetime` " . $order_value . " ";
							
							break;						
						
					}
					
				}
				
				$sql .= "ORDER BY " . $subsql;
				
			}
			
			if(isset($params['limit']) && isset($params['page'])) {
				
				$start_index = ($params['page'] - 1) * $params['limit'];
				
				$sql .= "LIMIT " . $start_index . ", " . database_essence::prepare($params['limit'], 'number');
				
			}
			
			if($data = database_essence::get_all($sql)) {
				
				if(is_array($data)) {
					
					foreach ($data as $key => $value) {
					
						$data[$key] = new user_object($value);
						
					}
					
					return $data;
					
				}
					
			}
			
			return array();
			
		}
		
		public static function get_user_by_id($user_id) {
			
			if(is_numeric($user_id)) {
			
				$sql = "SELECT `user_id` FROM `users` WHERE `user_id` = " . database_essence::prepare($user_id);
				
				if($data = database_essence::get_row($sql)) {
					
					return new user_object($data);
					
				}
				
			}
			
			return null;
			
		}
		
		public static function get_user_by_login($user_login) {
			
			if(is_string($user_login)) {
			
				$sql = "SELECT `user_id` FROM `users` WHERE `user_login` = " . database_essence::prepare($user_login);
				
				if($data = database_essence::get_row($sql)) {
					
					return new user_object($data);
					
				}
				
			} 
				
			return null;
			
		}
		
		public static function get_user_by_email($user_email) {
			
			if($user_email) {
			
				$sql = "SELECT `user_id` FROM `users` WHERE `user_email` = " . database_essence::prepare($user_email);
				
				if($data = database_essence::get_row($sql)) {
					
					return new user_object($data);
					
				}
				
			} 
				
			return null;
			
		}
		
		/* Get object data functions */
		public static function get_user_login($user_id) {
			
			if(is_numeric($user_id)) {
			
				$sql = "SELECT `user_login` FROM `users` WHERE `user_id` = " . database_essence::prepare($user_id);
				
				if($data = database_essence::get_one($sql)) {
					
					return $data;
					
				}
				
			}
			
			return null;
			
		}
		
		public static function get_user_email($user_id) {
			
			if(is_numeric($user_id)) {
			
				$sql = "SELECT `user_email` FROM `users` WHERE `user_id` = " . database_essence::prepare($user_id);
				
				if($data = database_essence::get_one($sql)) {
					
					return $data;
					
				}
				
			}
			
			return null;
			
		}
		
		public static function get_user_password($user_id) {
			
			if(is_numeric($user_id)) {
			
				$sql = "SELECT `user_password` FROM `users` WHERE `user_id` = " . database_essence::prepare($user_id);
				
				if($data = database_essence::get_one($sql)) {
					
					return $data;
					
				}
				
			}
			
			return null;
			
		}
		
		public static function get_total_users() {
			
			$sql = "SELECT COUNT(*) FROM `users`";
			
			if($data = database_essence::get_one($sql)) {
					
				return $data;
					
			}
			
			return null;
			
		}
	
	}
	
?>