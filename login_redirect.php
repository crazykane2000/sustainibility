<?php session_start();
    //   date_default_timezone_set('Asia/Kolkata');  
    // if($_REQUEST['g-recaptcha-response']==""){
    //  	header('Location:index.php?choice=error&value= Empty Captcha, try again');
    //  	exit();
    //  }
    //  $secret = '6LfVNn4UAAAAAH_dSJfLKeu3IWh0ZPtPwnavunCQ';
    //  $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
    //  $responseData = json_decode($verifyResponse, true);
    
    
    //  if($responseData['success']==''){
    //     	header('Location:index.php?choice=error&value= Invalid Captcha, try again');
    //     	exit();
    // }
        
	//print_r($_REQUEST);
    include 'administrator/connection.php';
	$pdo = new PDO($dsn, $user, $pass, $opt);
	$user = $_REQUEST['user'];
	$email = $_REQUEST['user'];
	$pass = $_REQUEST['pass'];
	$role = "user";

	//print_r($_REQUEST);

	if(isset($_REQUEST['login'])){
		// check if the user has selected the role or not?
		if ($role=="") {
			header('Location:index.php?choice=error&value=Please Select a Role ');
			exit();
		}
		try {
		    $stmt = $pdo->prepare('SELECT * FROM `users` WHERE `email` = "'.$email.'" AND `password`="'.$pass.'" AND `verified`="Yes"');
		    echo 'SELECT * FROM `users` WHERE `email` = "'.$email.'" AND `password`="'.$pass.'" AND `verified`="Yes"';
		   } catch(PDOException $ex) {
		    echo "An Error occured!"; 
		    print_r($ex->getMessage());
		}
		
		$stmt->execute();
		$user = $stmt->fetch();
		$row_count = $stmt->rowCount();	
		echo $row_count;

		if($row_count>0){	
			if($user['g_auth_key']==""){
				$_SESSION['user'] = $email;
				$_SESSION['role'] = "user";
			 	$_SESSION['loged_primitives'] = md5($pass);
				header('Location:dashboard.php?choice=success&value=Login Successful, Welcome to User Panel');
				exit();
			}
			else{
				$_SESSION['secrets'] = $user['g_auth_key'];
				 header('Location:login_otp.php?choice=success&value=Enter OTP&passcode='.base64_encode($_REQUEST['user']));
		     	exit();
			}
		}else{
			header('Location:index.php?choice=error&value=Please Relogin, Previous Supplied Credentials Were Wrong or Account was Not Verified');
			exit();
		}
	}
	

?>