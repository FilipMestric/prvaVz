<?
	class database {
		var $con = null;
		var $last = "";
		
		function __construct() {
			$this->connect();
		}
		
		function __destruct() {
			$this->con->close();
		}		
		
		function __sleep() {
			$this->con->close();
			return array('con');
		}
		
		function __wakeup() {
			$this->connect();
		}
		
		function connect() {
			$this->con = mysqli_connect("localhost", "dbadmin", "ude4yhege", "zadmin_prvavz");

			if (mysqli_connect_errno()) {
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
		}
		
		// Create a standard data format for insertion of PHP dates into MySQL
		public function fdate($php_date) {
			return date('Y-m-d H:i:s', strtotime($php_date));	
		}
	  
		// All text added to the DB should be cleaned with mysqli_real_escape_string
		// to block attempted SQL insertion exploits
		public function escape($str) {
			return mysqli_real_escape_string($this->con, $str);
		}
		
		// Test to see if a specific field value is already in the DB
		// Return false if no, true if yes
		public function in_table($table, $val, $and = false) {
			$query = "SELECT * FROM " . $table . " WHERE ";
			
			if(is_array($val)) {
				foreach($val as $key => $v) {
					$query .= " $key = '".$this->escape($v)."' ". ((end($val) !== $v) ? ($and) ? "AND" : "OR" : "");
				}
			}
			else {
				$query .= " ".$val;
			}
			
			$result = mysqli_query($this->con, $query);
			$this->last = $query;
			return mysqli_num_rows($result) > 0;
		}

		// Perform a generic select and return a pointer to the result
		public function query($query) {
			$result = mysqli_query($this->con, $query);
			$this->last = $query;
			$output = Array();
			if(is_bool($result)) return false;
			while($row = mysqli_fetch_array($result)) array_push($output, $row);
			
			return $output;
		}
		
		// Add a row to any table
		public function insert($table, $val, $return_id = false) {
			$query = "INSERT INTO " . $table . " ";
			$keys = "";
			$values = "";
			if(is_array($val)) {
				foreach ($val as $key => $v) {
					$keys .= "$key, ";
					$values .= "'".$this->escape($v)."', ";
				}
				$query .= "(".rtrim($keys, ', ').") VALUES (".rtrim($values, ', ').")";
			}
			else {
				$query .= " ".$val;
			}
			
			mysqli_query($this->con, $query);
			$this->last = $query;
			if($return_id) return mysqli_insert_id($this->con); 
		}
	  
		// Update any row that matches a WHERE clause
		public function update($table, $val, $where) {
			$query = "UPDATE ".$table." SET";
			if(is_array($val)) {
				foreach($val as $key => $v) {
					$query .= " $key = '".$this->escape($v)."'". ((end($val) !== $v) ? "," : "");
				}
				rtrim($query, ',');
			}
			else {
				$query .= " ".$val;
			}
			$query .= " WHERE ".$where;
			mysqli_query($this->con, $query);
			$this->last = $query;
			
		} 
		
		public function delete($table, $val, $and = false) {
			$query = "DELTE FROM " . $table . " WHERE ";
			
			if(is_array($val)) {
				foreach($val as $key => $v) {
					$query .= " $key = '".$this->escape($v)."' ". ((end($val) !== $v) ? ($and) ? "AND" : "OR" : "");
				}
				rtrim($query, ($and) ? "AND" : "OR");
			}
			else {
				$query .= " ".$val;
			}
			
			$result = mysqli_query($this->con, $query);
			$this->last = $query;
			return true;
		} 
	}
?>