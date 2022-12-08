  <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo $_SESSION['logo'] ?>" width="70" height="70" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['company'] ?> Admin</div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <?php
                   if($_SESSION['project']=='all'){
                       ?>

                     <li class="tb paris active">
                        <a href="leads.php">
                            <i class="material-icons">equalizer</i>
                            <span>Website Form Leads</span>
                        </a>
                    </li>   
                   
                    <?php
                }else{
                    ?>
                
                    <?php
                }
                ?>
                <li class="tb paris active">
                    <a href="locations.php">
                        <i class="material-icons">add_location</i>
                        <span>Locations</span>
                    </a>
                </li>
                <li class="tb paris active">
                    <a href="projects.php">
                        <i class="material-icons">location_city</i>
                        <span>Projects</span>
                    </a>
                </li>
                
                <li class="tb paris active">
                    <a href="amenities.php">
                        <i class="material-icons">list</i>
                        <span>Amenities</span>
                    </a>
                </li>

                <li class="tb paris active">
                    <a href="projectamenities.php">
                        <i class="material-icons">line_weight</i>
                        <span> Project Amenities</span>
                    </a>
                </li>

                <li class="tb paris active">
                    <a href="projectimages.php">
                        <i class="material-icons">insert_photo</i>
                        <span>Project Images</span>
                    </a>
                </li>

            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy;2021 <br> Powered by<br> <a target="_blank" href="http://firsteconomy.com/">Firsteconomy</a>.
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
