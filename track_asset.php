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
        <style type="text/css">            
            :focus{
                outline: 0px solid transparent !important;
            }
            .timeline {
                padding: 50px 0;
                position: relative;
            }
            .timeline-nodes {
                    padding-bottom: 25px;
                    position: relative;
                }
            .timeline-nodes:nth-child(even) {
                flex-direction: row-reverse;
            }
            .timeline h3, .timeline p {
                padding: 5px 15px;
            } 
            .timeline h3{
                font-weight: lighter;
                background: var(--blue);
            }
            .timeline p, .timeline time {
                color: var(--blue)
            }
            .timeline::before {
                content: "";
                display: block;
                position: absolute;
                top: 0;
                left: 50%;
                width: 0;
                border-left: 2px dashed var(--blue);
                height: 100%;
                z-index: 1;
                transform: translateX(-50%);
            }
            .timeline-content {
                border: 1px solid var(--blue);
                position: relative;
                border-radius: 0 0 10px 10px;
                box-shadow: 0px 3px 25px 0px rgba(10, 55, 90, 0.2)
            }
            .timeline-nodes:nth-child(odd) h3,
            .timeline-nodes:nth-child(odd) p {
                text-align: right;
            }
            .timeline-nodes:nth-child(odd) .timeline-date {
                text-align: left;
            }
             
            .timeline-nodes:nth-child(even) .timeline-date {
                text-align: right;
            }
            .timeline-nodes:nth-child(odd) .timeline-content::after {
                content: "";
                position: absolute;
                top: 5%;
                left: 100%;
                width: 0;
                border-left: 10px solid var(--blue);
                border-top: 10px solid transparent;
                border-bottom: 10px solid transparent;
            }
            .timeline-nodes:nth-child(even) .timeline-content::after {
                content: "";
                position: absolute;
                top: 5%;
                right: 100%;
                width: 0;
                border-right: 10px solid var(--blue);
                border-top: 10px solid transparent;
                border-bottom: 10px solid transparent;
            }
            .timeline-image {
                position: relative;
                z-index: 100;
            }
            .timeline-image::before {
                content: "";
                width: 80px;
                height: 80px;
                border: 2px dashed var(--blue);
                border-radius: 50%;
                display: block;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%,-50%);
                background-color: #fff;
                z-index: 1;
                

            }
            .timeline-image img {
                position: relative;
                z-index: 100;
            }
            /*small device style*/

            @media (max-width: 767px) {
                .timeline-nodes:nth-child(odd) h3,
                .timeline-nodes:nth-child(odd) p {
                text-align: left
            }
            .timeline-nodes:nth-child(even) {
                flex-direction: row;
            }
                .timeline::before {
                content: "";
                display: block;
                position: absolute;
                top: 0;
                left: 4%;
                width: 0;
                border-left: 2px dashed var(--blue);
                height: 100%;
                z-index: 1;
                transform: translateX(-50%);
            }
            .timeline h3 {
                font-size: 1.7rem;
            }
            .timeline p {
                font-size: 14px;
            }
            .timeline-image {
                position: absolute;
                left: 0%;
                top: 60px;
                /*transform: translateX(-50%;);*/
            }
            .timeline-nodes:nth-child(odd) .timeline-content::after {
                content: "";
                position: absolute;
                top: 5%;
                left: auto;
                right: 100%;
                width: 0;
                border-left: 0;
                border-right: 10px solid var(--blue);
                border-top: 10px solid transparent;
                border-bottom: 10px solid transparent;
            }
            .timeline-nodes:nth-child(even) .timeline-content::after {
                content: "";
                position: absolute;
                top: 5%;
                right: 100%;
                width: 0;
                border-right: 10px solid var(--blue);
                border-top: 10px solid transparent;
                border-bottom: 10px solid transparent;
            }
            .timeline-nodes:nth-child(even) .timeline-date {
                text-align: left;
            }
            .timeline-image::before {
                width: 65px;
                height: 65px;
            }
            }

            /*extra small device style */
            @media (max-width: 575px) {
                .timeline::before {
                content: "";
                display: block;
                position: absolute;
                top: 0;
                left: 3%;
            }
            .timeline-image {
                position: absolute;
                left: -5%;
                }
            .timeline-image::before {
                width: 60px;
                height: 60px;
            }
        }
        </style>
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
                                    <li class="breadcrumb-item active" aria-current="page">Track Timeline</li>
                                </ol>
                            </nav>
                            <h1 class="page-title">Track Timeline</h1>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="container">
                                          <div class="timeline">
                                            <?php 
                                                $data = get_assets_log();
                                                $data = json_decode($data,true);
                                                //print_r($data);
                                                foreach ($data as $key => $value) {
                                                    include 'status.php';
                                                   // echo $status;
                                                    $date = $value['timestamp'];
                                                     if($_REQUEST['assetId']!=$value['assetId']) {
                                                       continue;
                                                    }
                                                    echo '<div class="row no-gutters justify-content-end justify-content-md-around align-items-start  timeline-nodes">
                                                              <div class="col-10 col-md-5 order-3 order-md-1 timeline-content">
                                                                <h3 class=" text-light" style="font-size:15px;">'.$value['actionPerformed'].'</h3>
                                                                <p style="color:#333;">
                                                                    <b>Block Number</b> : '.$value['blockNumber'].'<br/>
                                                                    <b>Block Hash</b>:<span style="word-wrap: break-word;">'.$value['blockHash'].'</span><br/>
                                                                    <b>Transaction Hash</b> : '.$value['transactionHash'].'<br/>
                                                                </p><br/>
                                                                <div style="font-size:17px;">'.$status.'</div>
                                                              </div>
                                                              <div class="col-2 col-sm-1 px-md-3 order-2 timeline-image text-md-center">
                                                                <img src="https://www.wolverinehs.org/wp-content/uploads/2016/03/icon-home.png" style="opacity:.2" class="img-fluid" alt="img">
                                                              </div>
                                                              <div class="col-10 col-md-5 order-1 order-md-3 py-3 timeline-date">
                                                                <time>'.date("Y-m-d H:i:s", substr(($date/1000000), 0, 10)).'</time>
                                                              </div>
                                                        </div>';
                                                }
                                             ?>
                                            
                                           
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