<?
	class misc {
		private $last_color = array();
		
		function capitalize($strings = array()) {
			if(is_array($strings)) {
				foreach($strings as &$s) $s = ucwords(strtolower($s));
			}
			else {
				$strings = ucwords(strtolower($strings)); 
			}
			return $strings; 
		}

		function is_ajax() {
			return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']==='XMLHttpRequest';
		}
		
		function check_var($major) {
			$r = true;
			for($i = 1; $i < func_num_args(); $i++) {
				$r *= isset($major[func_get_arg($i)]);
			}
			return $r;
		}
		
		function random_pic($dir = 'uploads', $last = false) {
			$files = glob($dir . '/*.*');
			
			$file = array_rand($files);
			if($last && $files[$file] == $last) return $this->random_pic($dir, $last);
			else return array('url' => $files[$file], 'exif' => exif_read_data($files[$file]));
		}
		
		function get_color() {
			$colors = json_decode(preg_replace('/\/\*(.|\s)*?\*\//', '', file_get_contents("core/colors.json")));
			$res = (array)$colors->colors[array_rand($colors->colors)];
			if($res == $this->last_color) 
				$return = $this->get_color();
			else {
				$return = $res;	
				$this->last_color = $res;
			}
			return $return;
		}
		
		function time_ago($date, $granularity=1) {
			$date = strtotime($date);
			$difference = time() - $date;
			if($difference == 0) return "now";
			$periods = array(
				'y' => 31536000,
				'w' => 604800, 
				'd' => 86400,
				'h' => 3600,
				'm' => 60,
				's' => 1);
				
				$retval = "";

				foreach ($periods as $key => $value) {
					if ($difference >= $value) {
						$time = floor($difference/$value);
						$difference %= $value;
						$retval .= $time;
						$retval .= $key;
						$granularity--;
					}
					if ($granularity == '0') { break; }
				}
				return $retval;      
		}
		
		function format_number($n) {
			if ($n < 1000) {
				$n_format = number_format($n);
			}
			else if ($n < 1000000) {
				// Anything less than a million
				$n_format = number_format($n / 1000) . 'K';
			} 
			else if ($n < 1000000000) {
				// Anything less than a billion
				$n_format = number_format($n / 1000000) . 'M';
			} 
			else {
				// At least a billion
				$n_format = number_format($n / 1000000000) . 'B';
			}
			
			return $n_format;
		}
		
		function get_key($len) {
			$chars = 'abcdefghijklmnopqrstuvwxyz0123456789';
			$key = "";
			for ($i = 0; $i < $len; ++$i) $key .= substr($chars, (mt_rand() % strlen($chars)), 1);
			return $key;
		}
	}

?>