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
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
        type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC">
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
        <?php include_once('config.php'); ?>

    <?php
        $sql = "SELECT * FROM `locations`"; 
        $locations = mysqli_query($db,$sql);
    ?>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <?php echo $_SESSION['company'] ?> Create Project
                                <a href="projects.php" button style="float:right" type="button"
                                    class="btn btn-success btn-sm">
                                    <- Back </button> </a> 
                            </h2> 
                        </div> 
                      
                       <div class="body">
                       
                           <form class="rows" action="projectSubmit.php" method="post" enctype="multipart/form-data">
                                    <?php
                                        
                                        if(isset($_REQUEST['eid']))
                                        {
                                            $eid=$_GET['eid'];
                                            $result=mysqli_query($db,"select * from projects where id=$eid");
                                            $single=mysqli_fetch_array($result);
                                            //print_r($single);
                                        }
                                    ?>

                                <div class="col-md-6">
                                    <label for="status" class="form-label">Select Location :</label>
                                    <select class="form-control form-select" name="location" id="location" aria-label="Default select example" required>
                                        <option value="" disabled>Select location</option>  
                                        <?php 
                                        foreach($locations as $location) { ?> 
                                            <option value="<?php echo $location['id']; ?>" <?php if(isset($single['location_id'])&& $single['location_id'] === $location['id']) { ?> selected <?php } ?> ><?php echo $location['name']?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" id="title"placeholder="Title" value="<?php if(isset($single)) echo  $single['title'] ?>"class="form-control" required>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="possession_date" class="form-label">Possession Date</label>
                                    <input type="date" name="possession_date" id="possession_date"placeholder="possession_date" value="<?php if(isset($single)) echo  $single['possession_date'] ?>"class="form-control" required>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="rerano" class="form-label">Rera No.</label>
                                    <input type="number" name="rera_no" id="rera_no"placeholder="Building no." value="<?php if(isset($single)) echo  $single['rera_no'] ?>"class="form-control" required>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="buildingno" class="form-label">Building No.</label>
                                    <input type="text" name="bldg_no" id="bldg_no"placeholder="Building no." value="<?php if(isset($single)) echo  $single['bldg_no'] ?>"class="form-control" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="start_price" class="form-label">Home Price Starting From</label>
                                    <input type="text" name="start_price" id="start_price"placeholder="starting price" value="<?php if(isset($single)) echo  $single['start_price'] ?>"class="form-control" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="configuration" class="form-label">Configuration</label>
                                    <input type="text" name="configuration" id="configuration"placeholder="configuration" value="<?php if(isset($single)) echo  $single['configuration'] ?>"class="form-control" required>
                                </div>
                               
                                <?php 
                                if(isset($single)) { ?>
                                    <div class="col-md-6">
                                        <label for="thumb_img" class="form-label">thumbnail Image</label>
                                        <input type="file" name="thumb_img" class="form-control"id="thumb_img">
                                        <img src="<?php echo  $single['thumb_img']; ?>" alt="img" height="100px" width="100px">
                                    </div>   
                                <?php 
                                }else{ ?>
                                    <div class="col-md-6">
                                        <label for="thumb_img" class="form-label">thumbnail Image</label>
                                        <input type="file" name="thumb_img" class="form-control"id="thumb_img" required >
                                        </div>
                                <?php   
                                }?>

                                <?php 
                                if(isset($single)) { ?>
                                    <div class="col-md-6">
                                        <label for="mob_banner" class="form-label">Mobile banner</label>
                                        <input type="file" name="mob_banner" class="form-control"id="mob_banner">
                                        <img src="<?php echo  $single['mob_banner']; ?>" alt="img" height="100px" width="100px">
                                    </div>   
                                <?php 
                                }else{ ?>
                                    <div class="col-md-6">
                                        <label for="mob_banner" class="form-label">Mobile banner</label>
                                        <input type="file" name="mob_banner" class="form-control"id="mob_banner" required >
                                        </div>
                                <?php   
                                }?>

                                <?php 
                                if(isset($single)) { ?>
                                    <div class="col-md-6">
                                        <label for="desk_banner" class="form-label">Desktop banner</label>
                                        <input type="file" name="desk_banner" class="form-control"id="desk_banner">
                                        <img src="<?php echo  $single['desk_banner']; ?>" alt="img" height="100px" width="100px">
                                    </div>   
                                <?php 
                                }else{ ?>
                                    <div class="col-md-6">
                                        <label for="desk_banner" class="form-label">Desktop banner</label>
                                        <input type="file" name="desk_banner" class="form-control"id="desk_banner" required >
                                        </div>
                                <?php   
                                }?>

                                <?php 
                                if(isset($single)) { ?>
                                    <div class="col-md-6">
                                        <label for="brouchure" class="form-label">Brouchure </label>
                                        <input type="file" name="brouchure" class="form-control"id="brouchure">
                                        <img src="<?php echo  $single['brouchure']; ?>" alt="img" height="100px" width="100px">
                                    </div>   
                                <?php 
                                }else{ ?>
                                    <div class="col-md-6">
                                        <label for="brouchure" class="form-label">Brouchure</label>
                                        <input type="file" name="brouchure" class="form-control"id="brouchure" required >
                                        </div>
                                <?php   
                                }?>

                                <?php 
                                if(isset($single)) { ?>
                                    <div class="col-md-6">
                                        <label for="floor_plans" class="form-label">Floor Plans </label>
                                        <input type="file" name="floor_plans" class="form-control"id="floor_plans">
                                        <img src="<?php echo  $single['floor_plans']; ?>" alt="img" height="100px" width="100px">
                                    </div>   
                                <?php 
                                }else{ ?>
                                    <div class="col-md-6">
                                        <label for="floor_plans" class="form-label">Floor Plans</label>
                                        <input type="file" name="floor_plans" class="form-control"id="floor_plans" required >
                                        </div>
                                <?php   
                                }?>

                                <div class="col-md-12">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" id="description" cols="30" rows="10"class="ckeditor form-control" required><?php if(isset($single)) echo  $single['description'] ?></textarea>
                                </div>

                                <div class="col-md-6">
                                    <label for="map_url" class="form-label">Location Map Url</label>
                                    <input type="text" name="map_url" id="map_url"placeholder="Only Map Location Url String...." value="<?php if(isset($single)) echo  $single['map_url'] ?>"class="form-control" required>
                                </div>

                                <div class="col-md-6">
                                <label for="status" class="form-label">Select Status :</label>
                                    <select class="form-control form-select" name="status" id="status" aria-label="Default select example" required>
                                        <option value="" >Select Status</option>
                                        <option value="1" <?php if(isset($single['status']) && $single['status'] === '1') { ?> selected <?php } ?> >Active</option>
                                        <option value="0" <?php if(isset($single['status']) && $single['status'] === '0') { ?> selected <?php } ?>>Inactive</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <input type="checkbox" value="1" id="show_home" name="show_home" <?php if(isset($single['show_home']) && $single['show_home'] === '1') { ?> checked <?php } ?> >Show On home
                                </div>
                                
                                <?php
                                if(isset($single) && $single['home_img']) { ?>
                                    <div class="col-md-6">
                                        <label for="home_img"class="form-label">Home Image </label>
                                        <input type="file" name="home_img" class="form-control"id="home_img">
                                        <img src="<?php echo  $single['home_img']; ?>" alt="img" height="100px" width="100px">
                                    </div>   
                                <?php 
                                }else{ ?>
                                    <div class="col-md-6" id="homeDiv">
                                        <label for="home_img" class="form-label">Home Image</label>
                                        <input type="file" name="home_img" class="form-control"id="home_img">
                                        </div>
                                <?php   
                                }?>
                                

                                <div class="row text-center">
                                  
                                        <?php 
                                        if(isset($single)) 
                                        {
                                        ?>
                                            <input type="hidden" value="<?php echo $single['id'] ?>" name="eid">
                                            <button style="margin-top:20px; margin-bottom:20px;" type="submit"
                                                name="edit" class="btn btn-primary">Edit project</button>
                                            <?php 
                                        }
                                        else
                                        { 
                                        ?>
                                            <button style="margin-top:20px; margin-bottom:20px;" type="submit"
                                                name="insert" class="btn btn-success">Create project</button>
                                        <?php 
                                        } ?>
                                  
                                </div>
                            </form>
                    
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="//cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"></script>
    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <!-- <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script> -->

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
        $(document).ready(function () {

            $('#homeDiv').hide();

            $('#example1').DataTable({
                "pageLength": 10,
            });

            $('#show_home').on('click', function () {
                if ($(this).prop('checked')) 
                {
                    $('#homeDiv').show();   
                } 
                else 
                {
                    $('#homeDiv').hide();
                }
            });

        });
    </script>
</body>

</html>