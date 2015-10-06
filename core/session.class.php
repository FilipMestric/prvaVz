<?
	class session {
		
		private $db = null;
		private $sessionid = null;
		
		function __construct($user_id = false) {
			if (isset($_SESSION['prva_database'])) $this->db = unserialize($_SESSION['prva_database']);
			else $this->db = new database(); 
			
			if(isset($_SESSION['prva_sid'])) $this->sessionid = $_SESSION['prva_sid'];
			if(!$user_id) {
				
			}
		} 
		
		function check_session() {
			
		}
		
		function create_session($user_id) {
			
			
		}
		
		private function make_key() {
			$m = new misc();
			$key = $m->get_key(15);
			$chk_key = $this->db->query("SELECT `session_id` FROM `prva_sessions` WHERE `session_key` = '$key'");
			if(!empty($chk_key)) {
				$key = $this->make_key();
			}
			return $key;
		}
	}
?> 