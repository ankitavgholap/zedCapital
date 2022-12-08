<?php     session_start();
	if(!isset($_SESSION['login']))
	{
		header('Location: index.php');
	}
	include_once('config.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?php echo $_SESSION['company'] ?>  Admin Panel</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

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

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/theme-blue-grey.min.css" rel="stylesheet" />
    <link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="//cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" rel="stylesheet" />
</head>

<body class="theme-blue-grey body-bg">

    <!-- Overlay For Sidebars
    <div class="overlay"></div>
    #END# Overlay For Sidebars -->
    <?php include_once('includes/header.php'); ?>
    <section>
        <?php include_once('includes/sidebar.php'); ?>
        <?php include_once('includes/rightbar.php'); ?>

    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Reset Password
                            </h2>
                        </div>
                        <div id="Bfrtip" class="Bfrtip"></div>
                        <div class="body table-responsive">
                            <form id="sign_in" method="POST" action="password_process.php">
                        <div class="input-group">
                       
                        <div class="form-line">
                            <input required type="text" class="form-control" name="username" Value="<?php echo $_SESSION['username'];?>" autofocus disabled>
                        </div>
                    </div>
                      <div class="input-group">
                       
                        <div class="form-line">
                            <input required type="text" class="form-control" name="password" placeholder="New Password"  autofocus>
                        </div>
                    </div>
                   <div class="input-group">
                        
                        <div class="form-line">
                            <input required type="text" class="form-control" name="cpassword" placeholder="Comfirm Password"  autofocus>
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
            </div>
            <!-- #END# Basic Table -->

        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>


    <!-- Jquery CountTo Plugin Js -->
    <script src="plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="//cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="//cdn.datatables.net/plug-ins/1.10.19/sorting/date-uk.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {

        $('#example1').DataTable({
            "pageLength": 10,
            "dom": 'Bfrtip',
            "columnDefs": [
                { "type": "date-uk", targets: 0 }
            ],
            "order": [[ 0, "desc" ]],
            "buttons": [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
            ]
        });

        $('.tb').removeClass('active');
        $('.paris').addClass('active');
    });
    </script>
</body>

</html>
