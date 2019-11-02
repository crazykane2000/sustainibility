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
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-style-1">
                                    <li class="breadcrumb-item">Home</li>
                                    <li class="breadcrumb-item active" aria-current="page">View All User</li>
                                </ol>
                            </nav>
                            <h1 class="page-title">View All User</h1>
                        </div>
                       <!--  <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6">
                                                <div class="ds-stat">
                                                    <span class="ds-stat-name">Total Assets</span>
                                                    <h3 class="ds-stat-number">6<span class="ds-stat-percent"><i class="fas fa-caret-up"></i>23%</span></h3>
                                                    <div class="progress" style="height: 3px;">
                                                        <div class="progress-bar bg-info" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="ds-stat">
                                                    <span class="ds-stat-name">Total Accounts</span>
                                                    <h3 class="ds-stat-number">45<span class="ds-stat-percent"><i class="fas fa-caret-down"></i>7%</span></h3>
                                                    <div class="progress" style="height: 3px;">
                                                        <div class="progress-bar bg-info" role="progressbar" style="width: 34%" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="ds-stat">
                                                    <span class="ds-stat-name">Support Questions</span>
                                                    <h3 class="ds-stat-number">15<span class="ds-stat-percent"><i class="fas fa-caret-up"></i>31%</span></h3>
                                                    <div class="progress" style="height: 3px;">
                                                        <div class="progress-bar bg-info" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">                                        
                                        <table class="table table-striped table-hover">
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Tx Address</th>
                                                <th>Date</th>
                                            </tr>
                                            <?php $i=1;
                                                $data = fetch_all_popo("users");
                                                foreach ($data as $key => $value) {
                                                    echo '<tr>
                                                        <td>'.$i.'</td>
                                                        <td><b>'.$value['name'].'</b></td>
                                                        <td>'.$value['email'].'</td>
                                                        <td>'.$value['tx_address'].'</td>
                                                        <td>'.$value['date'].'</td>
                                                    </tr>';
                                                    $i++;
                                                }
                                             ?>
                                            
                                        </table>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                     
                    </div><!-- Main Wrapper -->

                    
                <div class="page-footer">
                    <p>2019 &copy; <?php echo $pdo_auth['name']; ?></p>
                </div>
                </div><!-- /Page Inner -->
               <?php include 'right_sidebar.php'; ?>
            </div><!-- /Page Content -->
        </div><!-- /Page Container -->
        
      <?php include 'footer.php'; ?>
    </body>

</html>