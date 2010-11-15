<?php
	
	/**
	 * 
	**/
	class comment_object {
		
		/* Construct function */
		function comment_object($data = array()) {
			
			$this->data = $data;
			
		}
		
		/* Get object data functions */
		public function get_id() {
			
			return isset($this->data['comment_id']) ? (int) $this->data['comment_id'] : null;
			
		}
		
		public function get_parent_id() {
			
			if(!isset($this->data['comment_parent_id'])) {
				
				$this->data['comment_parent_id'] = comment_model::get_comment_parent_id($this->get_id());
				
			}
			
			return $this->data['comment_parent_id'];
			
		}
		
		public function get_content() {
			
			if(!isset($this->data['comment_content'])) {
				
				$this->data['comment_content'] = comment_model::get_comment_content($this->get_id());
				
			}
			
			return $this->data['comment_content'];
			
		}
		
		public function get_add_datetime() {
			
			if(!isset($this->data['comment_add_datetime'])) {
				
				$this->data['comment_add_datetime'] = comment_model::get_comment_add_datetime($this->get_id());
				
			}
			
			return $this->data['comment_add_datetime'];
			
		}
		
		public function get_file_id() {
			
			if(!isset($this->data['file_id'])) {
				
				$this->data['file_id'] = comment_model::get_file_id($this->get_id());
				
			}
			
			return $this->data['file_id'];
			
		}
		
		public function get_user_id() {
			
			if(!isset($this->data['user_id'])) {
				
				$this->data['user_id'] = comment_model::get_user_id($this->get_id());
				
			}
			
			return $this->data['user_id'];
			
		}
		
		public function get_user_login() {
			
			if(!isset($this->data['user_login'])) {
				
				$this->data['user_login'] = user_model::get_user_login($this->get_user_id());
				
			}
			
			return $this->data['user_login'];
			
		}
		
		public function get_reply_url() {
			
			return config_essence::get('root_url') . 'file/add_comment/' . $this->get_file_id() . '/' . $this->get_id();
			
		}
		
		public function get_subcomments() {
			
			if(!isset($this->data['subcomments'])) {
				
				$this->data['subcomments'] = comment_model::get_comments(
				
					array(
						
						'filters' => array(
								
							'file_id' => $this->get_file_id(),
								
							'comment_parent_id' => $this->get_id()
								
						),
							
						'orders' => array(
							
							'comment_add_datetime' => 'asc'
							
						)
						
					)
				
				);
				
			}
			
			return $this->data['subcomments'];
			
		}
		
		
		/* Set object data functions */
		public function set_parent_id($data) {
			
			$this->data['comment_parent_id'] = $data;
			
		}
		
		public function set_content($data) {
			
			$this->data['comment_content'] = $data;
			
		}
		
		public function set_file_id($data) {
			
			$this->data['file_id'] = $data;
			
		}
		
		public function set_user_id($data) {
			
			$this->data['user_id'] = $data;
			
		}
		
	}
	
?>