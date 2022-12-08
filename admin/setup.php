<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Setup Utility</title>
    <!-- Favicon-->

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
        <div class="card">
            <div class="body">
                <form  method="POST" action="submitSetup1.php">
                    <div class="msg">Setup Utility</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">schedule</i>
                        </span>
                        <div class="form-line">
                            <input required type="text" class="form-control" name="timezone" placeholder="Timezone" value=""  autofocus>
                        </div>
                    </div>
					   <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">dns</i>
                        </span>
                        <div class="form-line">
                            <input required type="text" class="form-control" name="hostname" placeholder="Hostname" value=""  autofocus>
                        </div>
                    </div>
					   <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input required type="text" class="form-control" name="dbuser" placeholder="DB Username" value=""  autofocus>
                        </div>
                    </div>
                      <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input required type="text" class="form-control" name="password" placeholder="DB Password"  autofocus>
                        </div>
                    </div>
                   <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">data_usage</i>
                        </span>
                        <div class="form-line">
                            <input required type="text" class="form-control" name="db_name" placeholder="DB Name"  autofocus>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">Submit</button>
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
