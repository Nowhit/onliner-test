<?php 
	
	class database_essence {
		
		/* Database connection */
		public static $db;
		
		/* Initialize database manager */
		public static function init() {
			
			if(config_essence::get('host', 'database') and config_essence::get('user', 'database') and config_essence::get('name', 'database')) {
				
				self::$db = mysql_connect(config_essence::get('host', 'database'), config_essence::get('user', 'database'), config_essence::get('password', 'database'));
				
				if(self::$db) {
					
					if(mysql_select_db(config_essence::get('name', 'database'))) {
						
						mysql_query("set character_set_client='utf8'");
						
						mysql_query("set character_set_results='utf8'");
						
						mysql_query("set collation_connection='utf8_general_ci'");
						
						return true;
						
					}
					
				}
				
			}
			
			return false;
			
		}
		
		/* Get one field */
		public static function get_one($sql) {
			
			/* Autoinitialize */
			if(!isset(self::$db)) {
				
				if(!self::init()) {
					
					return null;
					
				}
				
			}
			
			/* Get sql result */
			$sql_result = mysql_query($sql);
			
			/* Return one field */
			if($sql_result) {
				
				$result_array = mysql_fetch_assoc($sql_result);
				
				if(is_array($result_array)) {
					
					return array_pop($result_array);
					
				} else {
					
					return null;
					
				}
				
			} else {
				
				return null;
				
			}
			
		}
		
		/* Get one row */
		public static function get_row($sql) {
			
			/* Autoinitialize */
			if(!isset(self::$db)) {
				
				if(!self::init()) {
					
					return null;
					
				}
				
			}
			
			/* Get sql result */
			$sql_result = mysql_query($sql);
			
			/* Return one row */
			if($sql_result) {
				
				$result_array = mysql_fetch_assoc($sql_result);
				
				if(is_array($result_array)) {
					
					return $result_array;
					
				} else {
					
					return null;
					
				}
				
			} else {
				
				return null;
				
			}
			
		}
		
		/* Get array of rows */
		public static function get_all($sql) {
			
			/* Autoinitialize */
			if(!isset(self::$db)) {
				
				if(!self::init()) {
					
					return null;
					
				}
				
			}
			
			/* Get sql result */
			$sql_result = mysql_query($sql);
			
			/* Return array of rows */
			if($sql_result) {
				
				$result_array = array();
				
				$num_rows = mysql_num_rows($sql_result);
				
				for($i=0; $i<$num_rows; $i++) {
					
					$result_array[] = mysql_fetch_assoc($sql_result);
					
				}
				
				return $result_array;
				
			} else {
				
				return null;
				
			}
						
		}
		
		/* Execute query */
		public static function query($sql) {
			
			/* Autoinitialize */
			if(!isset(self::$db)) {
				
				if(!self::init()) {
					
					return null;
					
				}
				
			}
			
			/* Return result */
			return mysql_query($sql);
			
		}
		
		/* Execute query and return last inserted id */
		public static function insert($sql, $table) {
			
			/* Autoinitialize */
			if(!isset(self::$db)) {
				
				if(!self::init()) {
					
					return null;
					
				}
				
			}
			
			/* Return result */
			if(mysql_query($sql)) {
				
				return self::get_one("SELECT LAST_INSERT_ID() FROM " . self::prepare($table, 'table'));
				
			} else {
				
				return null;
				
			}
			
		}
		
		/* Execute query and return affected rows */
		public static function update($sql) {
			
			/* Autoinitialize */
			if(!isset(self::$db)) {
				
				if(!self::init()) {
					
					return null;
					
				}
				
			}
			
			/* Return result */
			if(mysql_query($sql)) {
				
				if(mysql_affected_rows() > 0) {
					
					return true;
					
				} else {
					
					return null;
					
				}
				
			} else {
				
				return null;
				
			}
			
		}
		
		/* Prepare safe data */
		public static function prepare($data, $type = 'string') {
			
			/* Autoinitialize */
			if(!isset(self::$db)) {
				
				if(!self::init()) {
					
					return null;
					
				}
				
			}
			
			/* Prepare data */
			switch ($type) {
				
				case 'string':
					
					$data = "'" . mysql_real_escape_string($data) . "'";
					
					break;
					
				case 'number':
					
					$data = intval($data);
					
					break;
					
				case 'table':
					
					$data = "`" . mysql_real_escape_string($data) . "`";
					
					break;
					
			}
			
			/* Return data */
			return $data;
			
		}
		
	}
	
?>