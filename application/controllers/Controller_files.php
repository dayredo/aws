<?php
	Class Controller_upload_file Extends Controller{

		function index(){
			
			View::GUI( 'pages/file.php');
			// if( isset($_FILES['file']['name']) ):
				// $var = new Upload( array(
					echo $_FILES['file']['name'] . '<br>'; 
					echo $_FILES['file']['type'] . '<br>';
					echo $_FILES['file']['tmp_name'] . '<br>';
					// ), 'write'  );
			// endif;	

		}

		// function create(){
				
		// 	View::GUI( 'pages/create_file.php');

		// }



		function error404() {
			View::generate_UI( 'Error404.php', 'template.php' );
		}

	}
?>