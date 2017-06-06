<?php
	class Router {
		
		private $file;
		private $controller;
		private $action;
		
		function __construct(){
			isset( $_GET['route'] ) ? $route = $_GET[ 'route' ] : $route = 'index';
			$route = trim( $route, '/' );
			$parts = explode( '/', $route );
			empty( $parts[0] ) ? $this->controller = 'index' : $this->controller = $parts[0];
			if(empty( $parts[1] )): 
				$this->action = 'index';
			else: 
				$this->action = $parts[1];
			endif;
			$file = 'Controller_' . $this->controller . '.php';
			$this->file = $file;
		}

		function delegate(){
			$full_dir_uri = site_path .'application' . DIRSEP . 'controllers' . DIRSEP . $this->file;
			is_readable( $full_dir_uri ) == true ? include_once( $full_dir_uri ) : View::GUI('error.php');
			$class = 'Controller_'. $this->controller;
			$controller = new $class;
			$action = $this->action;
			if( is_callable( array( $controller, $this->action ) ) == true ) $controller->$action();
		}

	}