<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once('config.php');

if(!empty($_REQUEST['username']))
{
	$username = $_REQUEST['username'];
}
else
{
	$username = '';
}
?>
<?php 
    session_start();
    if(isset($_SESSION['login']))
    {
        header('Location: leads.php');
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title> Admin Panel</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);"><img src="../img/paradigm/logo-white.png">
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="reset_process.php">
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input required type="text" class="form-control" name="username" value="<?php echo $username;  ?>"  autofocus>
                        </div>
                    </div>
                      <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input required type="text" class="form-control" name="password" placeholder="Password"  autofocus>
                        </div>
                    </div>
                   <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input required type="text" class="form-control" name="cpassword" placeholder="Confirm Password"  autofocus>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">Reset Password</button>

                        </div>
                        
                        <div class="col-xs-12 text-center">
                            <?php  if(isset($_SESSION['login_msg'])){
                                echo '<label class="label bg-blue-grey">'.$_SESSION['login_msg'].'</label>' ;
                                unset($_SESSION['login_msg']);
                                }  ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-in.js"></script>
</body>

</html>
