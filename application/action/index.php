<?php
	
	class index_action {
		
		public static function index() {
			
			$files = file_model::get_files(
				
				array(
					
					'orders' => array(
						
						'file_add_datetime' => 'desc'
						
					),
					
					'limit' => 7,
					
					'page' => 1
				
				)
				
			);
			
			$users = user_model::get_users(
				
				array(
					
					'orders' => array(
						
						'user_signin_datetime' => 'desc'
						
					),
					
					'limit' => 7,
					
					'page' => 1
				
				)
				
			);
			
			
			view_essence::assign('breadcrumb', 'Главная');
			
			view_essence::assign('users', $users);
			
			view_essence::assign('files', $files);
			
			view_essence::display('index/index');
			
		}
		
	}
	
?>