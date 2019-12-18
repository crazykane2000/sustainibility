<?php session_start();
    include 'administrator/connection.php';
    include 'administrator/function.php';
    $pdo_auth = authenticate();
    $pdo = new PDO($dsn, $user, $pass, $opt);  
?><!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Responsive Admin Dashboard Template">
        <meta name="keywords" content="admin,dashboard">
        <meta name="author" content="stacks">
        <title><?php include 'title.php'; ?></title>
        <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/plugins/font-awesome/css/all.min.css" rel="stylesheet">
        <link href="assets/plugins/icomoon/style.css" rel="stylesheet">
        <link href="assets/plugins/switchery/switchery.min.css" rel="stylesheet"> 

        <link href="assets/css/concept.min.css" rel="stylesheet">
        <link href="assets/css/custom.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="page-container">
            <?php include 'page_and_setting_sidebar.php'; ?>
            <div class="settings-overlay"></div>
            <!-- Page Content -->
            <div class="page-content">
               <?php include 'secondary_sidebar.php'; ?>
                <!-- Page Header -->
                <div class="page-header">
                    
                  <?php include 'navigation.php'; ?>
                </div><!-- /Page Header -->
                <!-- Page Inner -->
                <div class="page-inner no-page-title">
                    <div id="main-wrapper">
                        <div class="content-header">
                           
                            <h1 class="page-title">Get Asset Details</h1>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Asset Details</h5>
                                        <hr/>
                                        <div class="table-responsive">
                                            <?php $datay = get_asset_details($_REQUEST['assetId']); $datay = json_decode($datay,true); //print_r($datay); ?>
                                            <table class="table table-striped">
                                                <tr>
                                                    <th>Keys</th>
                                                    <th>Value</th>
                                                </tr>
                                                <tr>
                                                    <td>Owner Address</td>
                                                    <td><?php  echo $datay['ownerAddress']; ?></td>
                                                </tr>

                                                <tr>
                                                    <td>Status</td>
                                                    <td><?php  $asset_status = get_asset_status($_REQUEST['assetId']); $asset_status = json_decode($asset_status,true); 
                                                        $value = $asset_status;
                                                        include 'status.php';
                                                        echo $status;
                                                     ?></td>
                                                </tr>

                                                <?php $owner_name = get_data_id_data("users", "tx_address", $datay['ownerAddress']);
                                                        $owner_name = $owner_name['name'];
                                                        if ($owner_name=="") {
                                                            $owner_name = "Anonymous";
                                                        }
                                                 ?>
                                                 <tr>
                                                    <td>Owner Name</td>
                                                    <td><?php  echo $owner_name; ?></td>
                                                </tr>

                                                <tr>
                                                    <td>Asset Name</td>
                                                    <td><?php  echo $datay['assetDataJSON']['Asset Name']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Supplier Name</td>
                                                    <td><?php  echo $datay['assetDataJSON']['Supplier Name']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Supplier Sustainability Index</td>
                                                    <td><?php  echo $datay['assetDataJSON']['Supplier Sustainability Index']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>ESG Score</td>
                                                    <td><?php  echo $datay['assetDataJSON']['ESG Score']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Material Type</td>
                                                    <td><?php  echo $datay['assetDataJSON']['Material Type']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Sourced From</td>
                                                    <td><?php  echo $datay['assetDataJSON']['Sourced From']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Packaged at</td>
                                                    <td><?php  echo $datay['assetDataJSON']['Packaged at']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Package Type</td>
                                                    <td><?php  echo $datay['assetDataJSON']['Package Type']; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Blockchain Details</h5>
                                        <hr/>
                                        <div class="table-responsive">
                                            <?php $data = get_transaction_detail($_REQUEST['tx_hash']); $data = json_decode($data,true);  ?>
                                            <pre>
                                               <code> <?php print_r($data); ?></code>
                                            </pre>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                     
                    </div><!-- Main Wrapper -->

                    
                <div class="page-footer">
                    <p>2019 &copy; Sustainability.io</p>
                    <!-- <p>2019 &copy; <?php echo $pdo_auth['name']; ?></p> -->
                </div>
                </div><!-- /Page Inner -->
               <?php include 'right_sidebar.php'; ?>
            </div><!-- /Page Content -->
        </div><!-- /Page Container -->
        
      <?php include 'footer.php'; ?>
    </body>

</html>