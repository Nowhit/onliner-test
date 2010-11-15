<?php
	
	class authorization_action {
		
		public static function signin() {
			
			if($me = session_essence::get('me')) {
				
				request_essence::load_request();
				
			}
			
			$validation = self::validate_signin();
			
			if($validation->valid()) {
				
				$user = new user_object();
				
				$user->set_login(data_essence::get('post', 'authorization-login', array('trim')));
				
				$user->set_email(data_essence::get('post', 'authorization-email', array('trim')));
				
				$user->set_password(md5(data_essence::get('post', 'authorization-password', array('trim'))));
				
				if($user_id = user_model::add_user($user)) {
					
					$me = new user_object(array('user_id' => $user_id));
					
					session_essence::set('me', $me);
					
					request_essence::load_request('user', 'view', array($me->get_login()));
					
				}
				
			} else {
				
				view_essence::assign('breadcrumb', 'Регистрация');
				
				view_essence::assign('validation', $validation);
				
				view_essence::display('authorization/signin');
				
			}
			
		}
		
		private static function validate_signin() {
			
			$validation = new validation_object();
			
			/* Validate: post data */
			if(empty($_POST)) {
				
				$validation->set('empty', true);
				
				return $validation;
				
			}
			
			/* Validate: required user login */
			if(!$user_login = data_essence::get('post', 'authorization-login', array('trim'))) {
				
				$validation->set('authorization-login', 'Введите логин');
				
			} else {
				
				/* Validate: valid user login */
				if(!data_essence::validate('login', $user_login)) {
					
					$validation->set('authorization-login', 'Введите правильный логин');
					
				} else {
				
					/* Validate: if this login already exist */
					if(user_model::get_user_by_login($user_login)) {
						
						$validation->set('authorization-login', 'Такой логин уже существует');
						
					}
					
				}
				
			}
			
			/* Validate: required user email */
			if(!$user_email = data_essence::get('post', 'authorization-email', array('trim'))) {
				
				$validation->set('authorization-email', 'Введите email');
				
			} else {
			
				/* Validate: valid user email */
				if(!data_essence::validate('email', $user_email)) {
					
					$validation->set('authorization-email', 'Введите правильный email');
					
				} else {
					
					/* Validate: if this email already exist */
					if(user_model::get_user_by_email($user_email)) {
						
						$validation->set('authorization-email', 'Такой email уже используется');
						
					}
					
				}
				
			}
			
			/* Validate: required user password */
			if(!$user_password = data_essence::get('post', 'authorization-password', array('trim'))) {
				
				$validation->set('authorization-password', 'Введите пароль');
				
			} else {
				
				/* Validate: valid user password */
				if(!data_essence::validate('password', $user_password)) {
					
					$validation->set('authorization-password', 'Пароль должен быть от 8 до 20 символов');
					
				} 
				
			}
			
			/* Validate: required user confirm password */
			if(!$user_confirm_password = data_essence::get('post', 'authorization-confirm-password', array('trim'))) {
				
				$validation->set('authorization-confirm-password', 'Введите подтвержение пароля');
				
			} else {
				
				/* Validate: valid user confirm password */
				if(!data_essence::validate('password', $user_confirm_password)) {
					
					$validation->set('authorization-confirm-password', 'Пароль должен быть от 8 до 20 символов');
					
				} else {
				
					/* Validate: if password not equal confirm password */
					if($user_password != $user_confirm_password) {
						
						$validation->set('authorization-confirm-password', 'Пароли не совпадают');
						
					}
					
				}
				
			}
			
			return $validation;
						
		}
		
		public static function login() {
			
			if($me = session_essence::get('me')) {
				
				request_essence::load_request();
				
			}
			
			$validation = self::validate_login();
			
			if($validation->valid()) {
				
				$me = user_model::get_user_by_login(data_essence::get('post', 'authorization-login', array('trim')));
				
				session_essence::set('me', $me);
				
				request_essence::load_request('user', 'view', array($me->get_login()));
				
			} else {
				
				view_essence::assign('breadcrumb', 'Авторизация');
				
				view_essence::assign('validation', $validation);
				
				view_essence::display('authorization/login');
				
			}
			
		}
		
		public static function validate_login() {
			
			$validation = new validation_object();
			
			/* Validate: post data */
			if(empty($_POST)) {
				
				$validation->set('empty', true);
				
				return $validation;
				
			}
			
			/* Validate: required user login */
			if(!$user_login = data_essence::get('post', 'authorization-login', array('trim'))) {
				
				$validation->set('authorization-login', 'Введите логин');
				
			} else {
				
				/* Validate: valid user login */
				if(!data_essence::validate('login', $user_login)) {
					
					$validation->set('authorization-login', 'Введите правильный логин');
					
				} else {
				
					/* Validate: if this login already exist */
					if(!$user = user_model::get_user_by_login($user_login)) {
						
						$validation->set('authorization-login', 'Такой логин не существует');
						
					}
					
				}
				
			}
			
			/* Validate: required user password */
			if(!$user_password = data_essence::get('post', 'authorization-password', array('trim'))) {
				
				$validation->set('authorization-password', 'Введите пароль');
				
			} else {
				
				/* Validate: valid user password */
				if(!data_essence::validate('password', $user_password)) {
					
					$validation->set('authorization-password', 'Введите правильный пароль');
					
				} else {
					
					if($user->get_password() != md5($user_password)) {
						
						$validation->set('authorization-password', 'Введите верный пароль');
						
					}
					
				}
				
			}
			
			return $validation;
			
		}
		
		public static function logout() {
			
			if($me = session_essence::get('me')) {
				
				session_essence::clear('me');
				
			}
			
			request_essence::load_request();
			
		}
		
	}
	
?>