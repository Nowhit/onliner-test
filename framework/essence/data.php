<?php 
	
	class data_essence {
		
		/* Get data */
		public static function get($object, $key, $filters = null) {
			
			/* Get data from object */
			switch ($object) {
				
				case 'server':
					
					$data = isset($_SERVER[$key])?$_SERVER[$key]:null;
					
					break;
				
				case 'post':
					
					$data = isset($_POST[$key])?$_POST[$key]:null;
					
					break;
					
				case 'files':
					
					$data = isset($_FILES[$key])?$_FILES[$key]:null;
					
					break;
				
				default:
					
					$data = null;
					
					break;
				
			}
			
			/* Does data need to be filtered? */
			if(is_array($filters)) {
				
				/* Return filtered data */
				return self::filter($data, $filters);
				
			} else {
				
				/* Return original data */
				return $data;
				
			}
			
		}
		
		/* Set data */
		public static function set($object, $key, $value) {
			
			/* Set data to object */
			switch ($object) {
				
				case 'server':
					
					$_SERVER[$key] = $value;
					
					break;
					
				case 'post':
					
					$_POST[$key] = $value;
					
					break;
				
			}
			
		}
		
		/* Filter data */
		public static function filter($data, $filters) {
			
			/* Does data is an array? */
			if(is_array($data)) {
				
				/* Filter each array element */
				foreach ($data as $data_key => $data_value) {
				
					$data[$data_key] = self::filter($data_value, $filters);
					
				}
				
			} else {
				
				/* Filter data by each filter */
				foreach ($filters as $filter) {
					
					switch ($filter) {
						
						case 'trim':
							
							$data = trim($data);
							
							break;
							
						case 'addslashes':
							
							$data = addslashes($data);
							
							break;
							
						case 'striptags':
							
							$data = strip_tags($data);
							
							break;
						
					}
					
				}
				
			}
			
			/* Return filtered data */
			return $data;
			
		}
		
		/* Validate data */
		public static function validate($data_type, $data) {
			
			/* Validate by type */
			switch ($data_type) {
				
				case 'id':
					
					if(is_numeric($data) and $data>0) {
						
						return true;
						
					} else {
					
						return false;
						
					}
					
				case 'url':
					
					if(preg_match('|^[\w\d_\-]+$|si', $data)) {
						
						return true;
						
					} else {
						
						return false;
						
					}
					
				case 'login':
					
					if(preg_match('|^[^_][A-z0-9]+[^_]$|si', $data)) {
						
						return true;
						
					} else {
						
						return false;
						
					}
					
					break;
					
				case 'email':
						
					if(preg_match('|(\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,6})|si', $data)) {
							
						return true;
							
					} else {
							
						return false;
							
					}
						
					break;
					
				case 'password':
						
					if(strlen($data) > 7 && strlen($data) < 20) {
							
						return true;
							
					} else {
							
						return false;
							
					}
						
					break;
					
				case 'date':
					
					list($year, $month, $day) = split('-', $data);
					
					$timestamp = mktime(0, 0, 0, $month, $day, $year);
					
					$date = date('Y-m-d', $timestamp);
					
					if($date == $data) {
						
						return true;
						
					} else {
						
						return false;
						
					}
					
					break;
					
				default:
					
					return false;
				
			}
			
		}
				
	}

?>