<?php 
	
	Class View {

		public static function GUI( $content, $template = null, $data = null ){
			
			empty( $template ) ? $template = 'template.php' : $template;
			include_once 'application' . DIRSEP . 'views' . DIRSEP . $template;
			
		}

		function error( $content ) {

			$dir = 'application' . DIRSEP . 'views';
			$fiels = scandir( $dir );
			array_shift( $fiels );
			array_shift( $fiels );
			foreach( $fiels as $value ):
				$value == $content ? $return = true : $return = false;
			endforeach;
			return $return;

		}

	}

?>