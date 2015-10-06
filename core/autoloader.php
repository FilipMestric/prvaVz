<?
	//error_reporting(0);

	function __autoload($class_name) {
		include "/var/zpanel/hostdata/zadmin/public_html/filip-mestric_iz_hr/prvavz/core/".$class_name .".class.php";
	}
?>