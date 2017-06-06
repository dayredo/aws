<?php
	Class Controller_index Extends Controller{

		function index(){
			$reg = new Runner;
			if( isset( $_POST['auth'] ) ):	
				$reg->authorization( [ $_POST['name'], $_POST['pass'] ] );
			elseif( isset( $_POST['reg'] ) ):
				$reg->registration( [ $_POST['name'], $_POST['role'], $_POST['pass'] ] );
			endif;
			if( isset( $_COOKIE['user_id'] ) and isset( $_GET['unlogin'] ) ):
				setcookie("user_id", ""); 
				setcookie("role", ""); 
				header( 'Location: /aws/', true, 307 );
			endif;
			View::GUI( 'pages/index.php');

		}

		function error404() {
			View::generate_UI( 'Error404.php', 'template.php' );
		}

	}
?>