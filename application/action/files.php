<?php
	
	class files_action {
		
		public static function view($current_page = 1, $current_order = 'file_add_datetime', $current_order_direction = 'desc') {
			
			$files = file_model::get_files(
				
				array(
							
					'orders' => array(
						
						$current_order => $current_order_direction
								
					),
							
					'limit' => 25,
							
					'page' => $current_page
							
				)
				
			);
			
			$total_files = file_model::get_total_files();
					
					
			$pages = ceil($total_files / 25);
			
			
			view_essence::assign('breadcrumb', 'Список файлов');
			
			view_essence::assign('files', $files);
			
			view_essence::assign('total_files', $total_files);
			
			view_essence::assign('pages', $pages);
			
			view_essence::assign('current_page', $current_page);
			
			view_essence::assign('current_order', $current_order);
					
			view_essence::assign('current_order_direction', $current_order_direction);
			
			view_essence::display('files/view');
			
		}
		
	}
	
?>