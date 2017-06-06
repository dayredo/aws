<?php
	header('Content-type: text/html; charset=utf-8'); 

	require_once( 'core/model.php' );
	require_once( 'core/controller.php' );
	require_once( 'core/route.php' );
	require_once( 'core/view.php' );
	require_once( 'core/registr.php' );
	require_once( 'core/ajax.php' );
	require_once( 'core/view_config.php' );
	
	error_reporting(E_ALL);

	define( 'DIRSEP', DIRECTORY_SEPARATOR );
	$site_path = realpath( dirname(__FILE__). DIRSEP. '..' .DIRSEP ) . DIRSEP;
	define( 'site_path', $site_path );

	#connect DB

	// define('NAME_DB','dayredo_zzz_com_ua');
	// define('USER_DB','ddayredo');
	// define('PASSWORD_DB','dlk924mw1');
	// define('HOST_DB','127.0.0.1:3306');
	// define('CHARSET_DB','utf8');

	// function __autoload($class_name){
	// 	$filename = strtolower($class_name) .'.php';
	// 	$file = site_path . 'application' . DIRSEP . 'core'. DIRSEP .'' .$filename;
		
	// 	if( file_exists( $file ) ):
	// 		require $file;
	// 	else:
	// 		return false;
	// 	endif;
	// }

	
	$dir = site_path .'application' . DIRSEP . 'models';
	$files = scandir($dir);
	array_shift($files);
	array_shift($files);
	foreach ($files as $key => $value) :
		require_once($dir . DIRSEP . $value);
	endforeach;
	
	
	

	$registr = new Registr;
	$registr->set('db', 'db' . DIRSEP . 'users.sqlite');
	$registr->set('path', $site_path);
	$registr->set('NAME_DB','dayredo_zzz_com_ua');
	$registr->set('USER_DB','ddayredo');
	$registr->set('PASSWORD_DB','dlk924mw1');
	$registr->set('HOST_DB','127.0.0.1:3306');
	$registr->set('CHARSET_DB','utf8');
	// echo $registr->get('db');
	
	if( isset( $_POST[ 'query' ] ) ):
		$class = $_POST[ 'object' ];
		$method = $_POST[ 'method' ];
		$model = '../models/Model_' . strtolower( $class ) . '.php';
		// require_once( $model );
		// echo $class;
		// echo print_r( $_POST['array'] );
		$object = new $class;
		return $object->$method( $_POST[ 'array' ] );
	endif;

	// Router::set_path( site_path .'application/controllers' );
	$router = new Router;
	$router->delegate();
	


?>