<?php
	
	/**
	 * Класс-объект
	**/
	class validation_object {
		
		public $data;
		
		/* Get object data functions */
		public function get($key) {
			
			return isset($this->data[$key]) ? $this->data[$key] : null;
			
		}
		
		public function set($key, $value) {
			
			$this->data[$key] = $value;
			
		}
		
		public function valid() {
			
			return sizeof($this->data) ? false : true;
			
		}
		
	}
	
?>