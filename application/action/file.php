<?php
	
	class file_action {
		
		public static function upload() {
			
			if(!$me = session_essence::get('me')) {
				
				request_essence::load_request();
				
			}
			
			$validation = self::validate_upload();
			
			if($validation->valid()) {
								
				$uploaded_file = data_essence::get('files', 'file-file');
				
				$uploaded_file_extension_array = split('\.', $uploaded_file['name']);
				
				$uploaded_file_extension = sizeof($uploaded_file_extension_array) > 1 ? end($uploaded_file_extension_array) : '';
				
				$uploaded_file_name = md5(time()) . '.' . $uploaded_file_extension;
							
				$uploaded_file_url = config_essence::get('root_url') . 'application/resource/upload/' . md5($me->get_login()) . '/';
							
				$uploaded_file_dir = config_essence::get('root_dir') . 'application/resource/upload/' . md5($me->get_login()) . '/';
							
				if(!is_dir($uploaded_file_dir)) {
						
					mkdir($uploaded_file_dir, 0777);
								
				}
							
				move_uploaded_file($uploaded_file['tmp_name'], $uploaded_file_dir . $uploaded_file_name);
				
				
				$file = new file_object();
				
				$file->set_name($uploaded_file_name);
				
				$file->set_origin_name($uploaded_file['name']);
				
				$file->set_header(data_essence::get('post', 'file-header', array('trim', 'striptags')));
				
				$file->set_content(data_essence::get('post', 'file-content', array('trim', 'striptags')));
				
				$file->set_user_agent(data_essence::get('server', 'HTTP_USER_AGENT'));
				
				$file->set_user_ip(data_essence::get('server', 'REMOTE_ADDR'));
				
				$file->set_user_id($me->get_id());

				if($file_id = file_model::add_file($file)) {
					
					request_essence::load_request('user', 'view', array($me->get_login()));
					
				}
				
			}
			
			view_essence::assign('breadcrumb', 'Загрузка файла');
			
			view_essence::assign('validation', $validation);
			
			view_essence::display('file/upload');
			
		}
		
		private static function validate_upload() {
			
			$validation = new validation_object();
			
			/* Validate: post data */
			if(empty($_POST)) {
				
				$validation->set('empty', true);
				
				return $validation;
				
			}
			
			/* Validate: required old user password */
			if(!$post_content = data_essence::get('post', 'file-header', array('trim'))) {
				
				$validation->set('file-header', 'Введите заголовок');
				
			}
			
			/* Validate: required photo */
			if(!$uploaded_file = data_essence::get('files', 'file-file', array('trim'))) {
				
				$validation->set('file-file', 'Выберите файл для загрузки');
				
			} else {
				
				if($uploaded_file['error'] != 0 && $uploaded_file['size'] == 0) {
						
					$validation->set('file-file', 'Ошибка при загрузке');
						
				}
				
			}
			
			return $validation;
			
		}
		
		public static function view($file_id = 0) {
			
			if($file_id) {
				
				if($file = file_model::get_file_by_id($file_id)) {
					
					view_essence::assign('breadcrumb', 'Просмотр файла');
					
					view_essence::assign('file', $file);
					
					view_essence::display('file/view');
					
				} else {
					
					view_essence::display('file/not_found');
					
				}
				
			} else {
				
				request_essence::load_request();
				
			}
			
		}
		
		public static function delete($file_id = 0) {
			
			if(!$me = session_essence::get('me')) {
				
				request_essence::load_request();
				
			}
			
			if($file_id) {
				
				if($file = file_model::get_file_by_id($file_id)) {
					
					if($file->get_user_id() == $me->get_id()) {
						
						comment_model::delete_comments($file_id);
						
						file_model::delete_file($file_id);
						
						request_essence::load_request('user', 'view', array($me->get_login()));
						
					} else {
						
						request_essence::load_request();
						
					}
					
				} else {
					
					request_essence::load_request();
					
				}
				
			} else {
				
				request_essence::load_request();
				
			}
			
		}
		
		public static function add_comment($file_id = 0, $comment_parent_id = 0) {
			
			if(!$me = session_essence::get('me')) {
				
				request_essence::load_request();
				
			}
			
			if($file_id) {
				
				if($file = file_model::get_file_by_id($file_id)) {
					
					if($comment_parent_id > 0) {
						
						if(!$comment = comment_model::get_comment_by_id($comment_parent_id)) {
							
							request_essence::load_request();
							
						} else if($comment->get_file_id() != $file_id) {
								
							request_essence::load_request();
								
						}
						
					}
					
					$comment = new comment_object();
					
					$comment->set_parent_id($comment_parent_id);
					
					$comment->set_content(data_essence::get('post', 'comment-content', array('trim', 'striptags')));
					
					$comment->set_file_id($file_id);
					
					$comment->set_user_id($me->get_id());
					
					if(comment_model::add_comment($comment)) {
						
						request_essence::load_request('file', 'view', array($file_id));
						
					} else {
						
						request_essence::load_request();
						
					}
					
				} else {
					
					request_essence::load_request();
					
				}
				
			} else {
				
				request_essence::load_request();
				
			}
			
		}
		
	}
	
?>