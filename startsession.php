<?
	
	include("core/autoloader.php");
	
	$db = new database();
	
	if(isset($_GET['facebook'])) {
		include("thirdparty/facebook.php");

		// Facebook login
		$facebook = new FacebookLogin('416480438549193', 'b045768fcd1a57e5aa62f824acb47ff1', 'http://filipm.eu/prvavz/fblogin.php');
		$user = $facebook->doLogin();
		
		// Check if user is registered already
		$chk_fb = $db->query("SELECT * FROM prva_users WHERE user_fbid = {$user->id}");
		
		
		if(!empty($chk_fb)) {
			// User is registered with us, set up the session
		}
	}
	
	
	
	
	
	
	
		echo "Whalecum back!";
	}
	else {
		echo "Hello {$user->first_name}, you've authenticated your Facebook account successfully!";
		//INSERT INTO `prva_users`(`user_id`, `user_name`, `user_officialname`, `user_fbid`, `user_email`, `user_officialemail`, `user_password`, `user_salt`, `user_created`, `user_permission`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10])
		$iid = $db->insert("prva_users", array('user_officialname' => $user->name, 'user_fbid' => intval($user->id), 'user_email' => $user->email), true);
		echo "<br>Your internal id is: $iid";
	}
?>