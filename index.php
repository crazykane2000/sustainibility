<?php  
    include 'administrator/connection.php';
    include 'administrator/function.php';
?>
<!DOCTYPE html>
<html lang="en">    
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Responsive Admin Dashboard Template">
        <meta name="keywords" content="admin,dashboard">
        <meta name="author" content="stacks">
        
        <!-- Title -->
        <title><?php include 'title.php'; ?></title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/plugins/font-awesome/css/all.min.css" rel="stylesheet">
        <link href="assets/plugins/icomoon/style.css" rel="stylesheet">
        <link href="assets/plugins/switchery/switchery.min.css" rel="stylesheet">

      
        <!-- Theme Styles -->
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
        
        <!-- Page Container -->
        <div class="page-container">
            <div class="login">
                <div class="login-bg" style="background-color: #2d95ec;background-image: url('opk.jpg');"></div>
                <div class="login-content">
                    <div class="login-box">
                        <div class="login-header">
                            <h3 style="color:#2d95ec ">Log In</h3>
                            <p>Welcome back! Please login to continue.</p>
                            <?php see_status($_REQUEST); ?>
                            <div style="padding: 10px;"></div>
                        </div>
                        <div class="login-body">
                            <form method="POST" action="login_redirect.php" enctype="">
                                <div class="form-group">
                                    <input type="email" class="form-control" required="" name="user" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" required="" name="pass" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <div class="custom-control custom-checkbox form-group">
                                    <input type="checkbox" class="custom-control-input" id="exampleCheck1">
                                    <label class="custom-control-label" for="exampleCheck1">Remember password</label>
                                </div>
                                <button type="submit" name="login" class="btn btn-primary" style="background-color: #2d95ec !important;border-color:#2d95ec !important">Login</button>
                            </form>
                           <br><a href="register.php" style="color: #2d95ec;font-weight: bold;">Create an account</a></p>
                        </div>
                        <div class="login-footer">
                            <p>Copyright <?php echo date("Y"); ?>, Sustainibility.io</p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /Page Container -->
        
        
        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-3.1.0.min.js"></script>
        <script src="assets/plugins/bootstrap/popper.min.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/plugins/switchery/switchery.min.js"></script>
        <script src="assets/js/concept.min.js"></script>
    </body>

</html>