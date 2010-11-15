<?php
	
	class comment_model {
		
		/* Manage object functions */
		public static function add_comment(comment_object $comment) {
			
			$sql = "INSERT INTO 
							
							`comments`(
							
								`comment_parent_id`,
								
								`comment_content`,
								
								`comment_add_datetime`,
								
								`file_id`,
								
								`user_id`
								
							) 
							
							VALUES(
								
								" . database_essence::prepare($comment->get_parent_id()) . ",
								
								" . database_essence::prepare($comment->get_content()) . ",
								
								NOW(),
								
								" . database_essence::prepare($comment->get_file_id()) . ",
								
								" . database_essence::prepare($comment->get_user_id()) . "
								
							)";
			
			if($comment_id = database_essence::insert($sql, 'comments')) {
				
				return $comment_id;
				
			}
			
			return null;
			
		}
		
		public static function delete_comments($file_id = 0) {
			
			if(is_numeric($file_id) && $file_id > 0) {
				
				$sql = "DELETE FROM `comments` WHERE `file_id` = " . database_essence::prepare($file_id);
				
				database_essence::query($sql);
				
			}
			
		}
		
		/* Get object functions */
		public static function get_comments($params = array()) {
			
			$sql = "SELECT 
								
								`comment_id` 
								
							FROM 
								
								`comments`
								
							WHERE
							
								`comment_id` > 0
								
							";
			
			if(isset($params['filters'])) {
				
				foreach($params['filters'] as $filter_key => $filter_value) {
					
					switch ($filter_key) {
						
						case 'file_id':
							
							$sql .= "AND `file_id` = " . database_essence::prepare($filter_value) . " ";
							
							break;
							
						case 'comment_parent_id':
							
							$sql .= "AND `comment_parent_id` = " . database_essence::prepare($filter_value) . " ";
							
							break;
						
					}					
					
				}				
				
			}
			
			if(isset($params['orders'])) {
				
				$subsql = "";
				
				foreach($params['orders'] as $order_key => $order_value) {
					
					$order_value = $order_value == 'desc' ? 'desc' : 'asc';
					
					switch ($order_key) {
						
						case 'comment_add_datetime':
							
							$subsql .= $subsql == ""? "" : ", ";
							
							$subsql .= "`comment_add_datetime` " . $order_value . " ";
							
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
					
						$data[$key] = new comment_object($value);
						
					}
					
					return $data;
					
				}
				
			}
			
			return array();
			
		}
		
		public static function get_comment_by_id($comment_id) {
			
			if(is_numeric($comment_id)) {
			
				$sql = "SELECT `comment_id` FROM `comments` WHERE `comment_id` = " . database_essence::prepare($comment_id);
				
				if($data = database_essence::get_row($sql)) {
					
					return new comment_object($data);
					
				}
				
			}
			
			return null;
			
		}
		
		
		
		/* Get object data functions */
		public static function get_comment_parent_id($comment_id) {
			
			if(is_numeric($comment_id)) {
			
				$sql = "SELECT `comment_parent_id` FROM `comments` WHERE `comment_id` = " . database_essence::prepare($comment_id);
				
				if($data = database_essence::get_one($sql)) {
					
					return $data;
					
				}
				
			}
			
			return null;
			
		}
		
		public static function get_comment_content($comment_id) {
			
			if(is_numeric($comment_id)) {
			
				$sql = "SELECT `comment_content` FROM `comments` WHERE `comment_id` = " . database_essence::prepare($comment_id);
				
				if($data = database_essence::get_one($sql)) {
					
					return $data;
					
				}
				
			}
			
			return null;
			
		}
		
		public static function get_comment_add_datetime($comment_id) {
			
			if(is_numeric($comment_id)) {
			
				$sql = "SELECT `comment_add_datetime` FROM `comments` WHERE `comment_id` = " . database_essence::prepare($comment_id);
				
				if($data = database_essence::get_one($sql)) {
					
					return $data;
					
				}
				
			}
			
			return null;
			
		}
		
		public static function get_file_id($comment_id) {
			
			if(is_numeric($comment_id)) {
			
				$sql = "SELECT `file_id` FROM `comments` WHERE `comment_id` = " . database_essence::prepare($comment_id);
				
				if($data = database_essence::get_one($sql)) {
					
					return $data;
					
				}
				
			}
			
			return null;
			
		}
		
		public static function get_user_id($comment_id) {
			
			if(is_numeric($comment_id)) {
			
				$sql = "SELECT `user_id` FROM `comments` WHERE `comment_id` = " . database_essence::prepare($comment_id);
				
				if($data = database_essence::get_one($sql)) {
					
					return $data;
					
				}
				
			}
			
			return null;
			
		}
		
		public static function get_total_comments($file_id = 0) {
			
			$sql = "SELECT COUNT(*) FROM `comments` ";
			
			if(is_numeric($file_id) && $file_id > 0) {
				
				$sql .= "WHERE `file_id` = " . database_essence::prepare($file_id);
				
			}
			
			if($data = database_essence::get_one($sql)) {
					
				return $data;
					
			}
			
			return null;
			
		}
		
	}
	
?>