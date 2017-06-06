<?php

	// namespace Registr;

	Class Registr {

		const LOGGER = 'logger';

		private static $storedValues = [];

		private static $allowedKeys = [ self::LOGGER, ];

		public static function set( $key, $value ) {
			// if( !in_array( $key, self::$allowedKeys ) ):
			// 	throw new Exception("invalid key given");
			// endif;

			self::$storedValues[ $key ] = $value;				
		}

		public static function get( $key ) {
			// if( !in_array( $key, self::$allowedKeys ) || !isset( self::$storedValues[ $key ] ) ):
			// 	echo "Invalid key given";
			// endif;

			return self::$storedValues[ $key ];
				
		}

		public function remove() {

		}

		public function logData() {

		}



	}