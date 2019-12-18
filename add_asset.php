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
                           
                            <h1 class="page-title">Add Asset</h1>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Enter The Asset Details</h5>
                                        <hr/>
                                        <form action="add_asset_handle.php" method="POST">
                                            <div class="form-group">
                                                <label  style="color: #222;font-weight: bold;">Asset Name </label>
                                                <input required type="text" class="form-control" name="asset_name" placeholder="Enter Asset Name">
                                            </div>

                                            <div class="form-group">
                                                <label  style="color: #222;font-weight: bold;">Supplier Name </label>
                                                <input required type="text" class="form-control" name="supplier_name" placeholder="Enter Supplier Name ">
                                            </div>

                                            <div class="form-group">
                                                <label  style="color: #222;font-weight: bold;">Supplier Sustainibility Index </label>
                                                <input required type="text" class="form-control" name="supplier_sustainibility_index" placeholder="Supplier Sustainibility Index">
                                            </div>

                                             <div class="form-group">
                                                <label  style="color: #222;font-weight: bold;">ESG Score</label>
                                                <input required type="number" class="form-control" name="esg_score" placeholder="ESG Score ">
                                            </div>

                                             <div class="form-group">
                                                <label  style="color: #222;font-weight: bold;">Material Type</label>
                                                <input required type="text" class="form-control" name="material_type" placeholder="Enter Material Type">
                                            </div>

                                             <div class="form-group">
                                                <label  style="color: #222;font-weight: bold;">Sourced From </label>
                                                <input required type="text" class="form-control" name="sourced_from" placeholder="Enter Sourced From">
                                            </div>

                                             <div class="form-group">
                                                <label  style="color: #222;font-weight: bold;">Packaged at </label>
                                                <input required type="text" class="form-control" name="packaged_at" placeholder="Packaged At">
                                            </div>

                                             <div class="form-group">
                                                <label  style="color: #222;font-weight: bold;">Packaged Type </label>
                                                <select required class="form-control" name="package_type" >
                                                    <option>Standard</option>
                                                    <option>Raw</option>
                                                    <option>Delicate</option>
                                                    <option>Radio Active</option>
                                                    <option>Hazardous</option>
                                                </select>
                                            </div>

                                             <div class="form-group">
                                                <label  style="color: #222;font-weight: bold;">Status</label>
                                                <select required class="form-control" name="status" >
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
                                                <button class="btn btn-primary btn-lg" type="submit">+ Add Asset</button>
                                            </div>
                                        </form>
                                        
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