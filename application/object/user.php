<?php
	
	/**
	 * Класс-объект работы с пользователями.
	**/
	class user_object {
		
		/* Construct function */
		function user_object($data = array()) {
			
			$this->data = $data;
			
		}
		
		/* Get object data functions */
		public function get_id() {
			
			return isset($this->data['user_id']) ? (int) $this->data['user_id'] : null;
			
		}
		
		public function get_login() {
			
			if(!isset($this->data['user_login'])) {
				
				$this->data['user_login'] = user_model::get_user_login($this->get_id());
				
			}
			
			return $this->data['user_login'];
			
		}
		
		public function get_email() {
			
			if(!isset($this->data['user_email'])) {
				
				$this->data['user_email'] = user_model::get_user_email($this->get_id());
				
			}
			
			return $this->data['user_email'];
			
		}
		
		public function get_password() {
			
			if(!isset($this->data['user_password'])) {
				
				$this->data['user_password'] = user_model::get_user_password($this->get_id());
				
			}
			
			return $this->data['user_password'];
			
		}
		
		public function get_url() {
			
			return config_essence::get('root_url') . 'user/view/' . $this->get_login() . '/';
			
		}
		
		
		
		/* Set object data functions */
		public function set_login($data) {
			
			$this->data['user_login'] = $data;
			
		}
		
		public function set_email($data) {
			
			$this->data['user_email'] = $data;
			
		}
		
		public function set_password($data) {
			
			$this->data['user_password'] = $data;
			
		}
		
	}
	
?>