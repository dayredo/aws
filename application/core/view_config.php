<?php
	
	Interface iView {
		public static function build_link( $type );
	}

	Class View_config {

		protected $type;
		protected $path;
		protected $fileDir;
		protected $files;

		function __construct() {
			$path = site_path . $this->fileDir . DIRSEP;
			$this->path = $path;
			$files = scandir( $this->path );
			array_shift($files);
			array_shift($files);
			$this->files = $files;
		}

		function attach( ) {
			$link = '';			
			foreach( $this->files as $key => $value ):
				if( is_file( $this->fileDir . DIRSEP . $value ) ):
					if( $this->fileDir == 'css'):
						$link .= '<link rel="stylesheet" href="' . $this->division_link( $this->path . $value ) . '">';
						echo $link;
					elseif( $this->fileDir == 'js' ):
						$link .= '<script src="' . $this->division_link( $this->path . $value ) . '"></script>';
						echo $link;
					endif;
				endif;
			endforeach;
			return $link;
		}

		function division_link( $link ) {
			$ex = explode( '/', trim( $link, '/\\' ));
			$links = 'http://' . $ex[5] . DIRSEP . $ex[6] . DIRSEP . $ex[7] . DIRSEP . $ex[8];
			return $links;
		}
	}

	Class ViewJS Extends View_config {
		protected $fileDir = 'js';
	}

	Class ViewCSS Extends View_config {
		protected $fileDir = 'css';
	}

	Class ViewDivision implements iView {
		public static function build_link( $type ) {
			$fileType = 'View' . strtoupper( $type );
			if( class_exists( $fileType ) ) return new $fileType( $type );
		}
	}

	Class ViewFile {

		public function style() {
			$exec = ViewDivision::build_link( 'css' );
			$exec->attach();
		}

		public function scripts() {
			$exec = ViewDivision::build_link( 'js' );
			$exec->attach();
		}

	}
?>