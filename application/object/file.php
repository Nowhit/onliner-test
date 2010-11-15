<?php
	
	/**
	 * 
	**/
	class file_object {
		
		/* Construct function */
		function file_object($data = array()) {
			
			$this->data = $data;
			
		}
		
		/* Get object data functions */
		public function get_id() {
			
			return isset($this->data['file_id']) ? (int) $this->data['file_id'] : null;
			
		}
		
		public function get_name() {
			
			if(!isset($this->data['file_name'])) {
				
				$this->data['file_name'] = file_model::get_file_name($this->get_id());
				
			}
			
			return $this->data['file_name'];
			
		}
		
		public function get_origin_name() {
			
			if(!isset($this->data['file_origin_name'])) {
				
				$this->data['file_origin_name'] = file_model::get_file_origin_name($this->get_id());
				
			}
			
			return $this->data['file_origin_name'];
			
		}
		
		public function get_header() {
			
			if(!isset($this->data['file_header'])) {
				
				$this->data['file_header'] = file_model::get_file_header($this->get_id());
				
			}
			
			return $this->data['file_header'];
			
		}
		
		public function get_content() {
			
			if(!isset($this->data['file_content'])) {
				
				$this->data['file_content'] = file_model::get_file_content($this->get_id());
				
			}
			
			return $this->data['file_content'];
			
		}
		
		public function get_url() {
			
			return config_essence::get('root_url') . 'file/view/' . $this->get_id() . '/';
			
		}
		
		public function get_download_url() {
			
			$user = user_model::get_user_by_id($this->get_user_id());
			
			return config_essence::get('root_url') . 'application/resource/upload/' . md5($user->get_login()) . '/' . $this->get_name();
			
		}
		
		public function get_delete_url() {
			
			return config_essence::get('root_url') . 'file/delete/' . $this->get_id();
			
		}
		
		public function get_add_datetime() {
			
			if(!isset($this->data['file_add_datetime'])) {
				
				$this->data['file_add_datetime'] = file_model::get_file_add_datetime($this->get_id());
				
			}
			
			return $this->data['file_add_datetime'];
			
		}
		
		public function get_user_agent() {
			
			if(!isset($this->data['user_agent'])) {
				
				$this->data['user_agent'] = file_model::get_user_agent($this->get_id());
				
			}
			
			return $this->data['user_agent'];
			
		}
		
		public function get_user_ip() {
			
			if(!isset($this->data['user_ip'])) {
				
				$this->data['user_ip'] = file_model::get_user_ip($this->get_id());
				
			}
			
			return $this->data['user_ip'];
			
		}
		
		public function get_user_id() {
			
			if(!isset($this->data['user_id'])) {
				
				$this->data['user_id'] = file_model::get_user_id($this->get_id());
				
			}
			
			return $this->data['user_id'];
			
		}
		
		public function get_comments() {
			
			if(!isset($this->data['comments'])) {
				
				$this->data['comments'] = comment_model::get_comments(
				
					array(
						
						'filters' => array(
								
							'file_id' => $this->get_id(),
								
							'comment_parent_id' => 0
								
						),
							
						'orders' => array(
							
							'comment_add_datetime' => 'asc'
							
						)
						
					)
				
				);
				
			}
			
			return $this->data['comments'];
			
		}
		
		public function get_total_comments() {
			
			if(!isset($this->data['total_comments'])) {
			
				$this->data['total_comments'] = comment_model::get_total_comments($this->get_id());	
				
			}
			
			return $this->data['total_comments'];
		
		}
		
		
		/* Set object data functions */
		public function set_name($data) {
			
			$this->data['file_name'] = $data;
			
		}
		
		public function set_origin_name($data) {
			
			$this->data['file_origin_name'] = $data;
			
		}
		
		public function set_header($data) {
			
			$this->data['file_header'] = $data;
			
		}
		
		public function set_content($data) {
			
			$this->data['file_content'] = $data;
			
		}
		
		public function set_user_agent($data) {
			
			$this->data['user_agent'] = $data;
			
		}
		
		public function set_user_ip($data) {
			
			$this->data['user_ip'] = $data;
			
		}
		
		public function set_user_id($data) {
			
			$this->data['user_id'] = $data;
			
		}
		
	}
	
?>