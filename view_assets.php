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
                           
                            <h1 class="page-title">View Asset</h1>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">List of Assets By : <?php echo $pdo_auth['name']; ?></h5>
                                        <hr/>
                                        <div class="table-responsive">
                                            <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Asset</th>
                                                    <th scope="col">ESG/SSI</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Seller</th>
                                                    <th scope="col">Location</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                     $array = array();
                                                    $data = get_assets_log();
                                                    $data = json_decode($data,true);
                                                    // print_r($data);
                                                    foreach ($data as $key => $value) {
                                                        $owner_name = get_data_id_data("users", "tx_address", $value['ownerAddress']);
                                                        //print_r($owner_name);
                                                        $owner_name = $owner_name['name'];
                                                        if ($owner_name=="") {
                                                            $owner_name = "Anonymous";
                                                        }
                                                        if ($value['ownerAddress']!=$pdo_auth['tx_address']) {
                                                            continue;
                                                        }

                                                        $asset_status = get_asset_status($value['assetId']); 
                                                        $asset_status = json_decode($asset_status,true);
                                                        $status = $asset_status['status'];
                                                        //print_r($status);
                                                        if (!in_array($value['assetId'], $array)) {
                                                           $array[] = $value['assetId'];
                                                        }else{continue;}
                                                        
                                                        //print_r($asset_status);
                                                        //include 'status.php';
                                                        $status = check_status($status);
                                                        echo '<tr>
                                                                <th  style="font-size:12px;">'.$value['assetId'].'</th>
                                                                <td><label class="badge badge-info">'.$value['assetDataJSON']['Asset Name'].'</label><br/>
                                                                <small>'.$value['transactionHash'].'</small></td>
                                                                <td>'.$value['assetDataJSON']['ESG Score']." / ".$value['assetDataJSON']['Supplier Sustainability Index'].'</td>
                                                                <td>'.$status.'</td>
                                                                <td><span style="font-weight:bold;color:green">'.$owner_name.'</span><br/>'.$value['ownerAddress'].'</td>
                                                                <td><small>Pkd.@</small><b>'.$value['assetDataJSON']['Packaged at'].'</b></td>
                                                                <td>'.date("Y-m-d H:i:s", substr(($value['timestamp']/1000000), 0, 10)).'</td>
                                                                <td>
                                                                <!--<a href="track_asset.php?assetId='.$value['assetId'].'&tx_hash='.$value['transactionHash'].'"><button type="button" class="btn btn-success btn-sm">Track</button> </a>
                                                                <a href="get_asset_details.php?assetId='.$value['assetId'].'&tx_hash='.$value['transactionHash'].'"><button type="button" class="btn btn-info btn-sm">info</button></a>-->

                                                                <div class="dropdown">
                                                                  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                                    Action
                                                                  </button>
                                                                  <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="track_asset.php?assetId='.$value['assetId'].'&tx_hash='.$value['transactionHash'].'">Track</a>
                                                                    <a class="dropdown-item" href="get_asset_details.php?assetId='.$value['assetId'].'&tx_hash='.$value['transactionHash'].'">Details</a>';

                                                                    if($_SESSION['user']=="admin@sustainibility.com"){
                                                                        echo '<a class="dropdown-item" data-toggle="modal" data-status="'.$value['status'].'" data-assetId="'.$value['assetId'].'" data-target="#myModal">Update</a>';
                                                                    }
                                                                    
                                                                    echo '
                                                                  </div>
                                                                </div></td>
                                                            </tr>';
                                                    }
                                                 ?>
                                            </tbody>
                                        </table>
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
       <script type="text/javascript">
            //triggered when modal is about to be shown
            $(".dropdown-item").click(function(){
                var assetId = $(this).data("assetid");
                var statuss = $(this).data("status");

                $("#iop").val(assetId);
                $("#nameStatus").val(statuss);

            });
            
        </script>
      <!-- The Modal -->
        <div class="modal" id="myModal">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Update Asset Status Here</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                <form action="update_status.php" method="POST">
                    <div class="form-group">
                        <label style="font-weight: bold;">Select Asset Id</label>
                        <input class="form-control" name="assetId" id="iop" placeholder="Enter Asset Id" readonly="" />                            
                        <small>Donot Change This, Selected By Default</small>
                    </div>

                     <div class="form-group">
                        <label style="font-weight: bold;">Select Status</label>
                        <select required class="form-control" name="status" id="nameStatus" >
                            <option>Raw material</option>
                            <option>Under Process</option>
                            <option>Processed</option>
                            <option>Cleared</option>
                            <option>Shipped</option>
                            <option>Invoiced</option>
                            <option>Cancelled</option>
                            <option>Disposed</option>
                            <option>Rejected</option>
                        </select>
                    </div>

                    <hr/>
                    <div class="form-group">
                         <button class="btn btn-info btn-lg" type="submit">Update Status</button>
                    </div>
                </form>
              </div>

             
            </div>
          </div>
        </div>

       
    </body>

</html>