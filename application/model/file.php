<?php
	
	class file_model {
		
		/* Manage object functions */
		public static function add_file(file_object $file) {
			
			$sql = "INSERT INTO 
							
							`files`(
							
								`file_name`,
								
								`file_origin_name`,
								
								`file_header`,
								
								`file_content`,
								
								`file_add_datetime`,
								
								`user_agent`,
								
								`user_ip`,
								
								`user_id`
								
							) 
							
							VALUES(
								
								" . database_essence::prepare($file->get_name()) . ",
								
								" . database_essence::prepare($file->get_origin_name()) . ",
								
								" . database_essence::prepare($file->get_header()) . ",
								
								" . database_essence::prepare($file->get_content()) . ",
								
								NOW(),
								
								" . database_essence::prepare($file->get_user_agent()) . ",
								
								" . database_essence::prepare($file->get_user_ip()) . ",
								
								" . database_essence::prepare($file->get_user_id()) . "
								
							)";
			
			if($file_id = database_essence::insert($sql, 'files')) {
				
				return $file_id;
				
			}
			
			return null;
			
		}
		
		public static function delete_file($file_id) {
			
			if(is_numeric($file_id)) {
				
				$sql = "DELETE FROM `files` WHERE `file_id` = " . database_essence::prepare($file_id) . " LIMIT 1";
				
				database_essence::query($sql);
				
			}
			
		}
		
		/* Get object functions */
		public static function get_files($params = array()) {
			
			$sql = "SELECT 
								
								`file_id` 
								
							FROM 
								
								`files`
								
							WHERE
							
								`file_id` > 0
								
							";
			
			if(isset($params['filters'])) {
				
				foreach($params['filters'] as $filter_key => $filter_value) {
					
					switch ($filter_key) {
						
						case 'user_id':
							
							$sql .= "AND `user_id` = " . database_essence::prepare($filter_value) . " ";
							
							break;						
						
					}					
					
				}				
				
			}
			
			if(isset($params['orders'])) {
				
				$subsql = "";
				
				foreach($params['orders'] as $order_key => $order_value) {
					
					$order_value = $order_value == 'desc' ? 'desc' : 'asc';
					
					switch ($order_key) {
						
						case 'file_add_datetime':
							
							$subsql .= $subsql == ""? "" : ", ";
							
							$subsql .= "`file_add_datetime` " . $order_value . " ";
							
							break;
							
						case 'file_origin_name':
							
							$subsql .= $subsql == ""? "" : ", ";
							
							$subsql .= "`file_origin_name` " . $order_value . " ";
							
							break;
						
					}
					
				}
				
				if($subsql) {
				
					$sql .= "ORDER BY " . $subsql;
					
				}
				
			}
			
			if(isset($params['limit']) && isset($params['page'])) {
				
				$start_index = ($params['page'] - 1) * $params['limit'];
				
				$sql .= "LIMIT " . $start_index . ", " . database_essence::prepare($params['limit'], 'number');
				
			}
			
			if($data = database_essence::get_all($sql)) {
				
				if(is_array($data)) {
					
					foreach ($data as $key => $value) {
					
						$data[$key] = new file_object($value);
						
					}
					
					return $data;
					
				}
					
			}
			
			return array();
			
		}
		
		public static function get_file_by_id($file_id) {
			
			if(is_numeric($file_id)) {
			
				$sql = "SELECT `file_id` FROM `files` WHERE `file_id` = " . database_essence::prepare($file_id);
				
				if($data = database_essence::get_row($sql)) {
					
					return new file_object($data);
					
				}
				
			}
			
			return null;
			
		}
		
		
		
		/* Get object data functions */
		public static function get_file_name($file_id) {
			
			if(is_numeric($file_id)) {
			
				$sql = "SELECT `file_name` FROM `files` WHERE `file_id` = " . database_essence::prepare($file_id);
				
				if($data = database_essence::get_one($sql)) {
					
					return $data;
					
				}
				
			}
			
			return null;
			
		}
		
		public static function get_file_origin_name($file_id) {
			
			if(is_numeric($file_id)) {
			
				$sql = "SELECT `file_origin_name` FROM `files` WHERE `file_id` = " . database_essence::prepare($file_id);
				
				if($data = database_essence::get_one($sql)) {
					
					return $data;
					
				}
				
			}
			
			return null;
			
		}
		
		public static function get_file_header($file_id) {
			
			if(is_numeric($file_id)) {
			
				$sql = "SELECT `file_header` FROM `files` WHERE `file_id` = " . database_essence::prepare($file_id);
				
				if($data = database_essence::get_one($sql)) {
					
					return $data;
					
				}
				
			}
			
			return null;
			
		}
		
		public static function get_file_content($file_id) {
			
			if(is_numeric($file_id)) {
			
				$sql = "SELECT `file_content` FROM `files` WHERE `file_id` = " . database_essence::prepare($file_id);
				
				if($data = database_essence::get_one($sql)) {
					
					return $data;
					
				}
				
			}
			
			return null;
			
		}
		
		public static function get_file_add_datetime($file_id) {
			
			if(is_numeric($file_id)) {
			
				$sql = "SELECT `file_add_datetime` FROM `files` WHERE `file_id` = " . database_essence::prepare($file_id);
				
				if($data = database_essence::get_one($sql)) {
					
					return $data;
					
				}
				
			}
			
			return null;
			
		}
		
		public static function get_user_agent($file_id) {
			
			if(is_numeric($file_id)) {
			
				$sql = "SELECT `user_agent` FROM `files` WHERE `file_id` = " . database_essence::prepare($file_id);
				
				if($data = database_essence::get_one($sql)) {
					
					return $data;
					
				}
				
			}
			
			return null;
			
		}
		
		public static function get_user_ip($file_id) {
			
			if(is_numeric($file_id)) {
			
				$sql = "SELECT `user_ip` FROM `files` WHERE `file_id` = " . database_essence::prepare($file_id);
				
				if($data = database_essence::get_one($sql)) {
					
					return $data;
					
				}
				
			}
			
			return null;
			
		}
		
		public static function get_user_id($file_id) {
			
			if(is_numeric($file_id)) {
			
				$sql = "SELECT `user_id` FROM `files` WHERE `file_id` = " . database_essence::prepare($file_id);
				
				if($data = database_essence::get_one($sql)) {
					
					return $data;
					
				}
				
			}
			
			return null;
			
		}
		
		public static function get_total_files($user_id = 0) {
			
			$sql = "SELECT COUNT(*) FROM `files` ";
			
			if(is_numeric($user_id) && $user_id > 0) {
				
				$sql .= "WHERE `user_id` = " . database_essence::prepare($user_id);
				
			}
			
			if($data = database_essence::get_one($sql)) {
					
				return $data;
					
			}
			
			return null;
			
		}
		
	}
	
?>