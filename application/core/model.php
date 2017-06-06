<?php

	/**
	*	@author Dayredo <dayredo00one@gmail.com>
	*	@version 1.0.1
	*	@package files
	*	@subpackage classes
	*/

	// Interface iModel {
	// 	protected function query();
	// }

	Class Model /* implements iModel */ {

		/**
		*	Include file SQL_settings.php
		*	This file have all connecting define variable
		*	@var string HOST_DB 
		*	@var string USER_DB
		*	@var string PASSWORD_DB
		*	@var string NAME_DB
		*	@var string CHARSET_DB
		*	@return void
		*/

		function __construct() {
			
			mysql_connect( '127.0.0.1:3306', 'ddayredo', 'dlk924mw1' ) or die( '<b>Error DB -> [Invalid connect to Data Base].</b> <i>In file <b>[MODEL.PHP]</b> on line <b>7</b></i>. <ul><li><b>Possible reasons for the error:</b></li><ol><i>Invalid load file <b>[sql_settings.php]</b></i></ol><ol><i>Invalid constant<b>[HOST_DB]</b></i></ol><ol><i>Invalid constant<b>[USER_DB]</b></i></ol><ol><i>Invalid constant<b>[PASSWORD_DB]</b></i></ol></ul>' );
			mysql_select_db( 'dayredo_zzz_com_ua' ) or die( '<br><b>Error DB -> [Not found Date Base]</b> or <b>[Invalid names Date Base].</b> <i>In file <b>[MODEL.PHP]</b> on line <b>7</b></i>.' );
			mysql_query("Charset 'utf8'");
			// echo 'DB Connect';
		}

		/**
		*	Incoming method, which called function: select(), insert(), update(), del(), insert_select()
		*	@access protected
		*	@uses $this->query()
		*	@param string $type_query 		Get type query: select, insert, update, delete, insert-select
		*	@param array $param 			Recieves parameters to perform in other functions
		*	@param string $return_method 	Get type returns method: mysql_num_rows(), mysql_fetch_assoc(), mysql_fetch_assoc()
		*	@return void
		*/

		function build_query( $table, $type_query, $param = array(), $operators = array() ) {
			switch( $type_query ):
				case "select":
					$result = Model::build_select_query( $table, $param, $operators );
				break;
				case "insert":
					$this->insert( $param = array() );
				break;
				case "update":
					$this->update( $param = array() );
				break;
				case "delete":
					$this->del( $param = array() );
				break;
				case "insert-select":
					$this->select( $param = array(), $return_type );
				break;
				default:

				break;
			endswitch;
			return $result;
		}

		// $param = array(
		// 	'where' => '*' || 
		// );

		// mysql_query("SELECT 'field_1', 'field_2' ... 'field_N' FROM 'table_name' WHERE 'field' ");

		function operators( $operators ) {
			$all_operators = array(
				'where', 				// mysql_query("SELECT * FROM 'table_name' WHERE 'fields'")
				'where_and',			// mysql_query("SELECT * FROM 'table_name' WHERE 'fields_1' = 'field_data_1' AND 'fields_2' = 'field_data_2' ")
				'between', 				// mysql_query("SELECT * FROM 'table_name' WHERE 'field' BETWEEN 'field_data_1' AND 'field_data_2'   ")
				'in', 					// mysql_query("SELECT * FROM 'table_name' WHERE 'fields' IN ( 'field_1', 'field_2', ... 'field_N' ) ")
				'like',  				// mysql_query("SELECT * FROM 'table_name' WHERE 'field' BETWEEN 'field_data_1' AND 'field_data_2'   ")
				'order_by', 			// mysql_query("SELECT * FROM 'table_name' WHERE 'fields' ORDER BY 'field' DESK ")
				'order_by_desc', 			// mysql_query("SELECT * FROM 'table_name' WHERE 'fields' ORDER BY 'field' DESK ")
				'limit'				// mysql_query("SELECT * FROM 'table_name' WHERE 'fields' ORDER BY 'field' DESK LIMIT 1 ")
			);
			for( $i = 0; $i <= count( $all_operators ); $i++ ):
				foreach ($operators as $key => $value):
					if( $key == $all_operators[ $i ] ):
						$result = Model::query_settings( $key, $value );
					endif;
				
				endforeach;
			endfor;
			return $result;
		}

		function query_settings( $operator_key, $operator_value ) {
			switch( $operator_key ):
				case "where":
					$result = '<span style="color:green">WHERE ' .  $operator_value . '</span><br>';
				break;
				case "where_and":
					$result = '<span style="color:green">WHERE ';
					foreach( $operator_value as $key => $value ):
						if( count( $operator_value ) <= 2 ):
							$result .= $key;
						else:
							$result = 'ERROR';
						endif;
					endforeach;
					$result .= '</span><br>';
				break;
				case "limit": 
					$result = '<span style="color:green">LIMIT ' . $operator_value . '</span><br>';
					break;
				case "order_by": 
					$result = '<span style="color:green">ORDER BY ' . $operator_value . '</span><br>';
					break;
				case "order_by_desc": 
					$result = '<span style="color:green">ORDER BY ' . $operator_value . ' DESC</span></br>';
					break;
				default:
					$result = '<span style="color:red">ERROR! ' . $operator_key . ' => ' . $operator_value . '</span> <br>';
					break;
			endswitch;
			echo $result;

		}	

		function exemple() {
			echo 'Exemple sql query with sql operators';
			$array = array(
				'select' => array(
					'select_all' => "<span class='marker-red'><span class='sql-operator'>SELECT * FROM</span></span> table_name <span class='sql-operator'>WHERE</span> field</span>",
					'select_castom' => "<span class='marker-red'><span class='sql-operator'>SELECT</span> field_1, field_2, ... field_N <span class='sql-operator'>FROM</span></span> table_name",
					'where' => "<span class='sql-operator'>SELECT * FROM</span> table_name <span class='marker-red'><span class='sql-operator'>WHERE</span> field</span> or <span class='sql-operator'>SELECT * FROM</span> table_name",
					'where_and' => "<span> class='sql-operator'SELECT * FROM</span> table_name <span class='marker-red'><span class='sql-operator'>WHERE</span> field_1 = data_field_1 <span class='sql-operator'>AND</span> field_2 = data_field_2</span>",
					'between' => "<span class='sql-operator'>SELECT * FROM</span> table_name <span class='sql-operator'>WHERE</span> field <span class='marker-red'><span class='sql-operator'>BETWEEN</span> data_field_1 <span class='sql-operator'>AND</span> data_field_2</span>",
					'in' => "<span class='sql-operator'>SELECT * FROM</span> table_name <span class='sql-operator'>WHERE</span> field <span class='marker-red'><span class='sql-operator'>IN</span> ( data_field_1, data_field_2 ... data_field_N )</span>",
					'like' => "<span class='sql-operator'>SELECT * FROM</span> table_name <span class='sql-operator'>WHERE</span> fields <span class='marker-red'><span class='sql-operator'>LIKE</span> </span>",
					'order_by' => "<span class='sql-operator'>SELECT * FROM</span> table_name <span>WHERE</span> fields <span class='marker-red'><span class='sql-operator'>ORDER BY</span> field</span>",
					'order_by_desk' => "<span class='sql-operator'>SELECT * FROM</span> table_name <span>WHERE</span> fields <span class='marker-red'><span class='sql-operator'>ORDER BY</span> field <span class='sql-operator'>DESK</span></span>",
					'limit' => "<span class='sql-operator'>SELECT * FROM</span> table_name <span class='sql-operator'>WHERE</span> fields <span class='marker-red'><span class='sql-operator'>LIMIT</span> 1</span>",
					'Castom command from this system' => array(
						'select',
						'where',
						'where_and',
						'between',
						'in',
						'like',
						'order_by',
						'order_by_desk',
						'limit'
					)
				),
				'insert' => array(
					'insert' => "<span class='marker-red'><span class='sql-operator'>INSERT INTO</span> table_name <span class='sql-operator'>SET</span> field_1 = 'data_field_1', field_2 = 'data_field_2', ... field_N = 'data_field_N'</span></span>"
				),
				'update' => array(
					'update' => "<span class='marker-red'><span class='sql-operator'>UPDATE</span> table_name </span> <span class='sql-operator'>SET</span> field = 'new_filed' </span>",
					'update_where' => "<span class='sql-operator'>SELECT * FROM</span> table_name <span class='marker-red'><span class='sql-operator'>WHERE</span> field</span>"
				),
				'delete' => array(
					'delete' => "<span class='marker-red'><span class='sql-operator'>DELETE FROM</span> table_name <span class='sql-operator'>WHERE</span> field</span>",
					'delete_order_by' => "<span class='marker-red'><span class='sql-operator'>DELETE FROM</span> table_name <span class='sql-operator'>WHERE</span> field</span>",
					'delete_limit' => "<span class='marker-red'><span class='sql-operator'>DELETE FROM</span> table_name <span class='sql-operator'>WHERE</span> field</span>",
					
				)

			);
			return $array;	
		}

		private function get_return_method( $var ) {
			switch( $var ):
				case "num_rows":
				break;
				case "fetch_assoc":
				break;
				case "fetch_array":
				break;
				default:
				break;
			endswitch;
		}

		/** 
		*	This method build query from type SELECT
		*	@access private
		*	@uses $this->query(
		*						[string]: 'select', 
		*						[string]: 'table_name',
		*						$array = array( $param = array( '*' ) or $param = array( [string]: 'field_1', [string]: 'field_2' ), 
		*						$array = array( 
		*										NULL or $array( 'field_1' => '[integer|string]', 'field_2' => '[integer|string]' ), 
		*										NULL or $array( 'field', [string]: 'desk' ), 
		*										NULL or [integer],
		*						),
		*						'[num_rows|fetch_array|fetch_assoc]' ) 
		*					);
		* 	@param array $param 		Get fields, which pass from executes 
		*	@var string $choice_data 	Returns variable
		*	@return void
		*/

		function build_select_query( $table, $param = array(), $other_param = array() ) {
			# if count array 1
			$params = array();
			$choice_data .= 'SELECT ';
			if( count($param) <=1 ):
				$choice_data .= $param[0];
			elseif( $param[0] === '*' ):
				$choice_data .= '*';
			else:
				# if count array > 1, disassemble an array to element on $key and $value
				foreach( $param as $key => $value ):
					# write in string $value to even iteration 
					$choice_data .= $value;
					# add ',' to even iteration, except for last iteration 
					if( $key != (count( $param ) - 1 ) ):
						$choice_data .= ', ';
					endif;
				endforeach;
			endif;
			$where = Model::operators( $other_param );
			$choice_data .= ' FROM ' . $table . ' WHERE ' . $where;
			return $choice_data;
			// $this->select( $table, $choice_data, $params, $return_method );
		}

		private function select( $table, $param = array(), $params, $return_type ) {

		}

		private function where( $find ) {
			if( count($find) <= 1 ):
				$where = $find[0];
			else:
				foreach( $find as $key => $value ):
					foreach ($find[ $key ] as $column => $data ):
						$where .= $column = '' . $data . '';
							if($key != (count( $find ) - 1 )):
								$where .= 'and '; 
							endif;
					endforeach;
				endforeach;
			endif;
			return $where;
		}

		/**
		*	This method ordered by result
		*	@param string $order 	If the given parameter is not set so string, it set NULL
		*	@param string $desk 	Analogous parameter $order
		*	@var string $order_by
		*	@return string or boolean false
		*/

		private function ordered( $order = null, $desk = null ) {
			if( !empty( $order ) ):
				$order_by = $order;
				if( !empty( $desk ) ): $order_by .= ' DESK'; endif;
			else:
				$order_by = false;
			endif;
			return $order_by;
		}

		function limit( $lim ) {
			!empty( $lim ) ? $limit = ' LIMIT ' . $lim : $limit = false;
			return $limit;
		}



		private function type_query( $type ) {
			// if( $type == 'select' or $type == 'delete' ):
				// function query('section', param = array( 'param_1', 'param_2' ), )
						

						
						


						

						
			}

			// function db_query( $type_query, $table_name, $data = array(), $param = array() ) {

			// 	switch( $type_query ):
			// 		case 'select':
			// 			$query = mysql_query( "SELECT " . $data[ 0 ] . " FROM " . $table_name . " WHERE " . $param . " " );
			// 			break;


			// }











































function create_subject() {}
	function view_subject() {}
	function record_subject() {}
	function delete_subject() {}

	function create_comment() {}
	function view_comment() {}
	function record_comment() {}
	function delete_comment() {}

	function create_reply() {}
	function view_reply() {}
	function record_reply() {}
	function delete_reply() {}

	function create_reply_quote() {}
	function view_reply_quote() {}
	function record_reply_quote() {}
	function delete_reply_quote() {}




		// function query( $type, $param = array(), $table, $find = array, $order = null, $desk = null, $limit = null );
		function __destruct() {
			mysql_close();
		}

	}

	


?>