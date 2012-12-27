<?php
	class Control_Login extends WebLab_Dispatcher_Module {
		
		public function _default(){
			//$this->layout->content = new WebLab_Template( 'static/home.php' );
			
			if( !empty($_POST) && $_POST['email'] != '' && $_POST['password'] != '' ){
				
				$email = $_POST['email'];
				$pass = $_POST['password'];
				
				/*
				if(!$this->checkEmail($email)) {
					header('Location:' . BASE .'?Err=incorrect-data');
					exit();
				}
				*/
				date_default_timezone_set('Europe/Amsterdam');
	

				$pass = Encrypt::md5($pass);

				// check by username
				if( Table_User::getInstance()->checkLoginByUser($email, $pass) ){
					$_SESSION['auth'] = 'authOk';


					$data = array(
						'timestamp' => date('Y-m-d H:i:s'),
						'name' => $email
					);

					Table_Logg::getInstance()->create($data);

					header('Location:' . BASE . 'Portfolio' );
					exit();			
				// check by email
				} elseif (Table_User::getInstance()->checkLoginByEmail($email, $pass)) {
					$_SESSION['auth'] = 'authOk';


					$data = array(
						'timestamp' => date('Y-m-d H:i:s'),
						'name' => $email
					);

					Table_Logg::getInstance()->create($data);

					header('Location:' . BASE . 'Portfolio' );
					exit();
				} else {
					header('Location:' . BASE .'?Err=incorrect-data');
					exit();
				}

			} else {
				header('Location:' . BASE . '?Err=No-data');
				exit();
			}
		}

		public function pass() {
			$pass = $_GET['password'];
			var_dump( Encrypt::md5($pass) );
		}

		public function checkEmail( $email ) {
			return filter_var($email, FILTER_VALIDATE_EMAIL); // FILTER_VALIDATE_EMAIL allowes .info etc <> preg_match() does not
		}
		
		public function logout() {
			session_destroy();
			header('Location:' . BASE );
			exit();
		}
		
	}