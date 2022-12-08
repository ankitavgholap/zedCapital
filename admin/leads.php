<?php session_start();
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
    <title><?php echo $_SESSION['company'] ?> Admin Panel</title>
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
    <?php
    
    $sql = "SELECT * FROM `leads` ORDER BY `created_at` DESC";
    $result = mysqli_query($db,$sql);
    ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <?php echo $_SESSION['company'] ?> Leads
                            </h2>
                        </div>
                        <div id="Bfrtip" class="Bfrtip"></div>
                        <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover" id="example1">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Location</th>
                                        <th>Project</th>
                                        <th>Project_name</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>message</th>                                    
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                        <tr>
                                           <td><?php echo date('d-m-Y', strtotime( $row['created_at'])); ?></td>
                                            <td><?php echo $row['location_id']; ?></td>
                                            <td><?php echo $row['project']; ?></td>
                                            <td><?php echo $row['project_name']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['mobile']; ?></td>
                                            <td><?php echo $row['message']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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
