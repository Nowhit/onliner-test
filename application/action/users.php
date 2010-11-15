<?php
	
	class users_action {
		
		public static function view($current_page = 1) {
			
			$users = user_model::get_users(
				
				array(
							
					'orders' => array(
						
						'user_signin_datetime' => 'desc'
								
					),
							
					'limit' => 35,
							
					'page' => $current_page
							
				)
				
			);
			
			$total_users = user_model::get_total_users();
					
					
			$pages = ceil($total_users / 35);
			
			
			view_essence::assign('breadcrumb', 'Список пользователей');
			
			view_essence::assign('users', $users);
			
			view_essence::assign('total_users', $total_users);
			
			view_essence::assign('pages', $pages);
			
			view_essence::assign('current_page', $current_page);
			
			view_essence::display('users/view');
			
		}
		
	}
	
?>