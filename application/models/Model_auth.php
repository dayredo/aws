<?php

	Abstract Class Auth {

		protected $type;
		protected $fields;
		protected $registr;

		function __construct( $type, $fields ) {
			$this->type = $type;
			$this->fields = $fields;
			$registr = new Registr;
			$this->registr = $registr;
		}

		public function auth() {
			$db = new PDO( 'mysql: host=' . $this->registr->get('HOST_DB') . '; dbname=' . $this->registr->get('NAME_DB')  . '', $this->registr->get('USER_DB'), $this->registr->get('PASSWORD_DB') );
			$name = $db->quote( $this->fields[0] );
			$query = $db->query( "SELECT * FROM users WHERE name = " . $name . " LIMIT 1") or die('Invalid insert <pre>' . print_r( $db->errorInfo() ) . '</pre>' );
			$query->execute();
			$data = $query->fetchAll();
			foreach( $data as $key => $value ):
				if( $value['name'] === $this->fields[0] ):
					if( $value['pass'] === $this->fields[1] ):
						$_SESSION['user_id'] = $data[0][ 'id_user' ];
							if( isset( $_SESSION[ 'user_id' ] ) ):
							setcookie("user_id", $data[0]['id_user'], time()+60*60*24*30);
							setcookie("role", $data[0]['role'], time()+60*60*24*30);
							header( 'Location: /aws/', true, 307 );
						endif;
					else:
						echo 'Invalid password';
					endif;
				else:
					echo 'Invalid login';
				endif;
			endforeach;
		}

		public function reg() {
			$arr = ['name', 'role', 'pass'];
			$keys = '';
			$values = '';
			for( $i = 0; $i <= count( $this->fields ) - 1; $i++ ) {
				$keys .= $arr[$i];
				$values .= "'" . $this->fields[$i] ."'";
				if( $i < 2 ){
					$keys .= ', ';
					$values .= ', ';
				}
			}
			$db = new PDO( 'mysql: host=' . $this->registr->get('HOST_DB') . '; dbname=' . $this->registr->get('NAME_DB')  . '', $this->registr->get('USER_DB'), $this->registr->get('PASSWORD_DB') );
			$db->exec( "INSERT INTO users (" . $keys . ") VALUES (" . $values . ")" ) or die('Invalid insert <pre>' . print_r( $db->errorInfo() ) . '</pre>' );
			$query = $db->query( "SELECT * FROM users WHERE name = '" . $this->fields[0] . "' LIMIT 1") or die('Invalid insert <pre>' . print_r( $db->errorInfo() ) . '</pre>' );
			$query->execute();
			$data = $query->fetchAll();
			$_SESSION['user_id'] = $data[0][ 'id_user' ];
			if( isset( $_SESSION[ 'user_id' ] ) ):
				setcookie("user_id", $data[0]['id_user'], time()+60*60*24*30);
				setcookie("role", $data[0]['role'], time()+60*60*24*30);
				header( 'Location: /aws/', true, 307 );
			else:
				echo 'session false';
			endif;
		}

	}

	Class TypeAuth Extends Auth {
		protected $type = 'auth';
	}

	Class TypeReg Extends Auth {
		protected $type = 'reg';
	}

	Class BuilderAuth {
		public static function buildAuth( $type, $fields ) {
			$typeSign = 'Type' . ucfirst( $type );
			if( class_exists( $typeSign ) ) return new $typeSign( $type, $fields );
		}
	}

	Class Runner {

		public function registration( $array ) {
			$type = 'reg';
			$exec = BuilderAuth::buildAuth( $type, array( $array['0'], $array['1'], $array['2'] ) );
			return $exec->reg();
		}

		public function authorization( $array ) {
			$type = 'auth';
			$exec = BuilderAuth::buildAuth( $type, array( $array['0'], $array['1'] ) );
			return $exec->auth();
		}

	}