<?php
	Class Controller_upload_file Extends Controller{

		function index(){
			
			$data = [];
			$dir = scandir(site_path . 'files/waiting');
			array_shift($dir);
			array_shift($dir);	
			$data = $dir;
			View::GUI( 'pages/file.php', 'template.php', $data);
			$var = new BuildTask;
			
			if( isset($_POST['name']) ):
				$var->upload( array( 'upload', 'move', $_POST['name'], $_POST['tmp'] ) );
			elseif( isset( $_FILES['file']['name'] ) ):
				$var->upload( array( 'upload', 'move', $_FILES['file']['name'], $_FILES['file']['type'], $_FILES['file']['tmp_name'] ) );
			endif;	
		}

		function error404() {
			View::generate_UI( 'Error404.php', 'template.php' );
		}

	}
?>