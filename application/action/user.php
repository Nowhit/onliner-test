<?php
	
	class user_action {
		
		public static function view($user_login = '', $current_page = 1, $current_order = 'file_add_datetime', $current_order_direction = 'desc') {
			
			if($user_login) {
				
				if($user = user_model::get_user_by_login($user_login)) {
										
					$files = file_model::get_files(
						
						array(
							
							'filters' => array(
								
								'user_id' => $user->get_id()
								
							),
							
							'orders' => array(
								
								$current_order => $current_order_direction
								
							),
							
							'limit' => 25,
							
							'page' => $current_page
							
						)
						
					);
					
					$total_files = file_model::get_total_files($user->get_id());
					
					
					$pages = ceil($total_files / 25);
					
					
					view_essence::assign('breadcrumb', 'Пользователь ' . $user_login);
					
					view_essence::assign('user', $user);
					
					view_essence::assign('files', $files);
					
					view_essence::assign('total_files', $total_files);
					
					view_essence::assign('pages', $pages);
					
					view_essence::assign('current_page', $current_page);
					
					view_essence::assign('current_order', $current_order);
					
					view_essence::assign('current_order_direction', $current_order_direction);
					
					view_essence::display('user/view');
					
				} else {
					
					view_essence::display('user/not_found');
					
				}
				
			} else {
				
				request_essence::load_request();
				
			}
			
		}
		
	}
	
?>