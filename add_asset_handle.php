<?php session_start();
    include 'administrator/connection.php';
    include 'administrator/function.php';
    $pdo_auth = authenticate();
    $pdo = new PDO($dsn, $user, $pass, $opt);  
    //print_r($_REQUEST);
  //Code Blockchain Starts Here
  $_assetId = uniqid();
  $_ownerAddress = $pdo_auth['tx_address'];
  $asset_name = $_REQUEST['asset_name'];
  $supplierName =  $_REQUEST['supplier_name'];
  $supplier_sustainibility_index = $_REQUEST['supplier_sustainibility_index'];
  $esg_score = $_REQUEST['esg_score'];
  $material_type = $_REQUEST['material_type'];
  $sourced_from = $_REQUEST['sourced_from'];
  $packaged_at = $_REQUEST['packaged_at'];
  $package_type = $_REQUEST['package_type'];
  $status = $_REQUEST['status'];



  $curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_PORT => "3002",
	  CURLOPT_URL => "http://13.233.7.230:3002/api/dataManager/add/asset",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_POSTFIELDS => "{  \n   \"_assetId\":\"$_assetId\",\n   \"_ownerAddress\":\"$_ownerAddress\",\n   \"_assetDataJSON\":{  \n      \"Asset Name\":\"$asset_name\",\n      \"Supplier Name\":\"$supplierName\",\n      \"Supplier Sustainability Index\":\"$supplier_sustainibility_index\",\n      \"ESG Score\":\"$esg_score\",\n      \"Material Type\":\"$material_type\",\n      \"Sourced From\":\"$sourced_from\",\n      \"Packaged at\":\"$packaged_at\",\n      \"Package Type\":\"$package_type\"\n   },\n   \"_status\":\"$status\"\n}",
	  CURLOPT_HTTPHEADER => array(
	    "Content-Type: application/json",
	    "Postman-Token: 25c6c78a-01a5-4465-9556-4f23704f453c",
	    "cache-control: no-cache"
	  ),
	));

	
	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
	  echo "cURL Error #:" . $err;
	} else {
	  add_notification("A New Asset has been added by ".$pdo_auth['name'], "admin");  
	  header('Location:view_assets.php?choice=success&value=Added Successfully, Tx Address is : '.$response);
	  exit();
	}
exit();

  
?>