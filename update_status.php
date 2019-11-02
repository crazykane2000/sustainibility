<?php session_start();
    include 'administrator/connection.php';
    include 'administrator/function.php';
    $pdo_auth = authenticate();
    $pdo = new PDO($dsn, $user, $pass, $opt);  

  	$curl = curl_init();
  	$assetId = $_REQUEST['assetId'];
  	$status = $_REQUEST['status'];


	curl_setopt_array($curl, array(
	  CURLOPT_PORT => "3002",
	  CURLOPT_URL => "http://13.233.7.230:3002/api/dataManager/update/assetStatus",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_POSTFIELDS => "{  \n   \"_assetId\":\"$assetId\",\n   \"_status\":\"$status\"\n}",
	  CURLOPT_HTTPHEADER => array(
	    "Content-Type: application/json",
	    "Postman-Token: 8b6afe82-2c19-4427-b237-c01a77ab407a",
	    "cache-control: no-cache"
	  ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
	  echo "cURL Error #:" . $err;
	} else {
	 	header('Location:view_assets.php?choice=success&value=Asset Status Updated Successfully');     
   		exit();
	}
   
?>
