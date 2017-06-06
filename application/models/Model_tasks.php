<?php

	// namespace Builder;
	
	Interface iBuilderTasks {

		public static function build( $type, $fields );

	}

	Abstract Class BuilderTaskItem {

		protected $type;
		protected $fields;
		protected $registr;


		function __construct( $type, $fields ) {
			$this->type = $type;
			$registr = new Registr;
			$this->registr = $registr;
			$this->fields = $fields;
		}

		public function done() {
			$db = new PDO( 'mysql: host=' . $this->registr->get('HOST_DB') . '; dbname=' . $this->registr->get('NAME_DB')  . '', $this->registr->get('USER_DB'), $this->registr->get('PASSWORD_DB') );
			echo $this->fields[0];
			$db->exec("UPDATE tasks SET action = 'done' WHERE id_task = '" . $this->fields[0] . "'" ) or die('Invalid Update <pre>' . print_r( $db->errorInfo() ) . '</pre>' );
		}

		public function upload() {
			echo $this->fields[1];
 			if( $this->fields[0] == 'move' ):
	 			if( file_exists( 'files/waiting/' . $this->fields[1] ) ):
	 				rename(	site_path . 'files/waiting/' . $this->fields[1], site_path .'files/upload/' . $this->fields[1]);
	 			endif;
	 		elseif( $this->fields[0] == 'upload' ):
	 			$uploadfile = "files/upload/" . $this->fields[1];
 				move_uploaded_file($this->fields[2], $uploadfile);
	 		endif;
		}

		public function createTask() {
			$data = '';
			foreach ($this->fields as $key => $value):
				$data .= "\t" . '{' . "\n\t\t" . '"task" : "' . $value . '"' . "\n\t" . '}';
				$key != count( $this->fields ) -1  ? $data .= ', ' . "\n" :	$data .= "\n";
			endforeach;
			$this->responseText( $data );
		}

		public function responseText( $str ) {
			$outp = '{"tasks" : [' . "\n" . $str . ']}';
			echo json_encode( $outp );
		}

		public function buildNewFile() {
			echo $this->fields;
			$file = fopen(site_path . 'files/waiting/family_task_'. date('d.m.Y|H:i:s') .'.json', "w");
			fwrite( $file, $this->fields );
			fclose( $file );
		}

		public function viewFile() {
			$file = file_get_contents(site_path . 'files/waiting/' . $this->fields );
			echo json_encode( $file );
		}

		public function parse() {
			foreach ($this->fields as $key => $value):
				$this->boltingHtml( $key, $value );		
			endforeach;
		}

		public function boltingHtml( $num, $text ) {
			$result = strip_tags( $text );
			$tags_arr = explode( ']', $result );
			$tags_bolt = array();
			foreach( $tags_arr as $key => $value ):
				$value = substr($value, 1);
				if( strlen( $value ) != 0 )$tags_bolt[] = $value;
			endforeach;
			$arr = ['father', 'mother', 'child'];
			$this->registrTask( $arr[$num], $tags_bolt );
		}

		public function registrTask( $num, $arr ) {
			foreach ($arr as $key => $value):
				$db = new PDO( 'mysql: host=' . $this->registr->get('HOST_DB') . '; dbname=' . $this->registr->get('NAME_DB')  . '', $this->registr->get('USER_DB'), $this->registr->get('PASSWORD_DB') );
				$values = "'" . $value . "', '" . $num . "'";
				$db->exec( "INSERT INTO tasks ( desk_task, role ) VALUES (" . $values . ")" ) or die('Invalid insert <pre>' . print_r( $db->errorInfo() ) . '</pre>' );
			endforeach;
		}

	}

	Class BuilderCreateFile Extends BuilderTaskItem {
		protected $type = 'create_file';
	}

	Class BuilderCreateTask Extends BuilderTaskItem {
		protected $type = 'create_task';
	}

	Class BuilderViewFile Extends BuilderTaskItem {
		protected $type = 'view_file';
	}

	Class BuilderUpload Extends BuilderTaskItem {
		protected $type = 'upload';
	}

	Class BuilderRemove Extends BuilderTaskItem {
		protected $type = 'remove';
	}

	Class BuilderDone Extends BuilderTaskItem {
		protected $type = 'done';
	}

	Class BuilderParse Extends BuilderTaskItem {
		protected $type = 'parse';
	}

	Class BuilderTaskFactory Implements iBuilderTasks {

		public static function build( $type, $fields ) {

			$typeBuild = 'Builder' . ucfirst( $type );

			if(class_exists( $typeBuild ) ): 
				return new $typeBuild( $type, $fields  ); 
			else: 
				throw new Exception("Invalid type");
			endif;
			
		}

	}

	Class BuildTask {

		public function createTask( $array ) {
			$exec = BuilderTaskFactory::build( $array['type'], $array['arr'] );
			return $exec->createTask();
		}

		public function parse( $array ) {
			$exec = BuilderTaskFactory::build( $array['type'], $array['arr'] );
			return $exec->parse();
		}

		public function createFile( $array ) {
			$exec = BuilderTaskFactory::build( $array['type'], $array['data'] );
			return $exec->buildNewFile();
		}

		public function viewFile( $array ) {
			$exec = BuilderTaskFactory::build( $array['type'], $array['data'] );
			return $exec->viewFile();
		}

		public function upload( $array ) {
			$exec = BuilderTaskFactory::build( $array[0], array( $array[1], $array[2], $array[3] ) );
			return $exec->upload();
		}

		public function remove( $array  ) {
			$exec = BuilderTaskFactory::build( $array[ 'type' ], array( $array['name_file'] ) );
			return $exec->remove();
		}

		public function done( $array ) {
			$exec = BuilderTaskFactory::build( $array[ 'type' ], array( $array['id_task'] ) );
			return $exec->done();
		}

	}