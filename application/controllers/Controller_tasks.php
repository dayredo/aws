<?php
	Class Controller_tasks Extends Controller{

		function index(){
			$registr = new Registr;
			$db = new PDO( 'mysql: host=' . $registr->get('HOST_DB') . '; dbname=' . $registr->get('NAME_DB')  . '', $registr->get('USER_DB'), $registr->get('PASSWORD_DB') );
			$query = $db->query( "SELECT * FROM tasks WHERE ( role = '" . $_COOKIE['role'] . "' ) AND ( action IS NULL )") or die('Invalid insert <pre>' . print_r( $db->errorInfo() ) . '</pre>' );
			$query->execute();
			$data = $query->fetchAll();

				
			View::GUI( 'pages/tasks.php', 'template.php', $data);

		}

		function create_tasks(){
				
			View::GUI( 'pages/create_tasks.php');

		}

		function create_file(){
				
			View::GUI( 'pages/create_file.php');

		}

		function error404() {
			View::generate_UI( 'Error404.php', 'template.php' );
		}

	}
?>