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
      $sql = "SELECT * FROM `projects` ORDER BY `id` DESC";    
      $result = mysqli_query($db,$sql);
    ?>
   
   <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <?php echo $_SESSION['company'] ?> projects Details
                                <a href="ProjectCreate.php" button style="float:right" type="button" class="btn btn-success btn-sm"> + Create project</button></a>
                            </h2>
                        </div>
                        <div id="Bfrtip" class="Bfrtip"></div>
                        <div class="body table-responsive">
                        <table id="example2" class="table table-bordered table-striped table-hover display">
                                <thead>
                                    <tr>
                                        <th>#Id</th>
                                        <th>Location_id</th>
                                        <th>Title</th>
                                        <th>Mobile Banner</th>
                                        <th>Desktop Banner</th>
                                        <th>Thumbnail Image</th>
                                        <th>Brouchure</th>
                                        <th>Floor Planse</th>
                                        <th>Home Image</th>
                                        <!-- <th>Building No</th>
                                        <th>Rera No</th>
                                        <th>possession Date</th>
                                        <th>Start Price</th>
                                        <th>Title</th> -->
                                        <th>Description</th> 
                                        <th>Status</th>
                                        <!-- <th>Created_at</th>
                                        <th>Updated_at</th>   -->
                                        <th>Action</th>                              
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['location_id']; ?></td>
                                            <td><?php echo $row['title']; ?></td>
                                            <td><img src="<?php echo $row['mob_banner']; ?>" alt="" height="50px" width="50px"></td>
                                            <td><img src="<?php echo $row['desk_banner']; ?>" alt="" height="50px" width="50px"></td>
                                            <td><img src="<?php echo $row['thumb_img']; ?>" alt="" height="50px" width="50px"></td>
                                            <td><img src="<?php echo $row['brouchure']; ?>" alt="" height="50px" width="50px"></td>
                                            <td><img src="<?php echo $row['floor_plans']; ?>" alt="" height="50px" width="50px"></td>
                                            <td><img src="<?php echo $row['home_img']; ?>" alt="" height="50px" width="50px"></td>
                                            <td><?php echo $row['description']; ?></td>
                                            <td><?php if($row['status']==1) echo "Active"; else echo "Inactive"; ?></td>
                                            
                                            <td><a  href="projectCreate.php?eid=<?php echo $row['id'];?>"button type="button" name="eid" class="btn btn-info">Edit</button></a>
									        <a href="projectSubmit.php?did=<?php echo $row['id'];?>" button type="button" class="btn btn-danger">Delete</button></a></td>
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

        $('#example2').DataTable({
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
