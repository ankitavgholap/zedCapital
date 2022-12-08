
<!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
 <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
 <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="dashboard.php"><?php echo $_SESSION['company'] ?> Admin Panel</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="pull-right">
                        <a href="javascript:void(0);" class="js-right-sidebar" data-close="true">
                            <i class="material-icons">more_vert</i>
                            <ul class="dropdown-menu pull-right">
                                 <li><a href="password.php" class=" waves-effect"><i class="material-icons">input</i>Reset Password</a></li>
                                <li><a href="logout.php" class=" waves-effect"><i class="material-icons">input</i>Sign Out</a></li>
                            </ul>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    
