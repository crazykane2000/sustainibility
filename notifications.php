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
        <meta name="description" content="Responsive Admin Notifications Template">
        <meta name="keywords" content="admin,Notifications">
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
                                    <li class="breadcrumb-item active" aria-current="page">Notifications</li>
                                </ol>
                            </nav>
                            <h1 class="page-title">Notifications</h1>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-11">
                                <div class="card">
                                    <div class="card-body">
                                         <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card-box table-responsive">
                                                    <?php                      
                                                      try {
                                                          $stmt = $pdo->prepare('SELECT * FROM `notification` ORDER BY date DESC LIMIT 10');
                                                      } catch(PDOException $ex) {
                                                          echo "An Error occured!"; 
                                                          print_r($ex->getMessage());
                                                      }
                                                      $stmt->execute();
                                                      $user = $stmt->fetchAll();
                                                      $i=1;
                                                      foreach ($user as $key => $value) {
                                                        echo '<a href="notifications.php" style="text-decoration:none"><div style="padding: 10px;border-bottom: solid 1px #eee;color:#333;font-size:14px;" class="mop">'.$value['notification'].'<div style="color:#888;font-size:11px;">Date : '.$value['date'].'</div></div></a>';
                                                              $i++;
                                                      }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
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