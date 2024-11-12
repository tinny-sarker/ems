<div id="left-sidebar" class="sidebar">
    <div class="">
        <div class="user-account">
            <?php
            if ($_SESSION['photo'] != '') {
            ?>
                <img src="uploads/<?= $_SESSION['photo'] ?>" alt="User photo" class="rounded-circle user-photo">

            <?php
            } else {
            ?>

                <img src="./assets/images/user.png" class="rounded-circle user-photo" alt="User Profile Picture">

            <?php
            }
            ?>
            <h5 class="user-name"><?= $_SESSION['name']; ?></h5>
            <?php
            if ($_SESSION['role_id'] == '1') {
            ?>

                
                <h6 class="">Admin</h6>
            
            
            <?php
            }            
            else {
            ?>
                <h6 class="">Employee</h6>
            <?php
            }
            ?>
        </div>

        <!-- Nav tabs -->
        <!-- Tab panes -->
        <div class="tab-content p-l-0 p-r-0">
            <div class="tab-pane active" id="menu">
                <nav id="left-sidebar-nav" class="sidebar-nav">
                <ul id="main-menu" class="metismenu">
                        <?php
                        if ($_SESSION['role_id'] == '2') {
                        ?>
                        
                            <li><a href="dashboard.php" class="menul"><i class="fa-solid fa-table-columns"></i> Dashboard </a></li>
                            <li><a href="attendance.php" class="menul"><i class="fas fa-user-check"></i> My Attendance </a></li>
                        <?php
                        }
                        if ($_SESSION['role_id'] == '3') {
                            
                        ?>
                            <li><a href="all-leave-application.php" class="menul"><i class="fas fa-tasks"></i> All Leave Application </a></li>

                        <?php
                        
                        }
                        if ($_SESSION['role_id'] == '1') {
                        ?>
                            <!-- start dropdown menu -->
                            <li><a data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="icon-user"></i> Employee </a>
                                <ul id="homeSubmenu1">
                                    <li><a href="all-employee.php"> <i class="icon-users"></i> All Employee </a></li>
                                    <li><a href="add-employee.php"> <i class="icon-plus"></i> Add New Employee </a></li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="icon-user"></i> Employee Type </a>
                                <ul id="homeSubmenu2">
                                    <li><a href="all-employee-type.php"> <i class="icon-user"></i> All Employee Type </a></li>
                                    <li><a href="add-employee-type.php"> <i class="fas fa-pencil"></i> Add  Employee Type </a></li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-tasks"></i> Task </a>
                                <ul id="homeSubmenu3">
                                    <li><a href="all-task.php"> <i class="fas fa-tasks"></i> All Task </a></li>
                                    <li><a href="add-task.php"> <i class="far fa-edit"></i> Add New Task </a></li>
                                </ul>
                            </li>
                            <li><a href="attendance-report-employee.php" class="menul"><i class="fas fa-file-alt"></i> Attendance Report </a></li>
                            <li><a href="message.php" class="menul"><i class="fas fa-message"></i> Message </a></li>

                            <!-- end dropdown menu -->
                        
                        <?php
                        
                        }
                        
                        ?>
                        <?php
                        if ($_SESSION['role_id'] == '2') {
                        ?>
                            <li><a href="single-employee-task.php" class="menul"><i class="fas fa-tasks"></i> Task </a></li>
                        <?php
                        }
                        ?>
                        <li><a href="index.php" class="menul"><i class="fa-solid fa-power-off"></i> EMS </a></li>
                        <li><a href="logout.php" class="menul"><i class="fas fa-sign-out-alt"></i> Log out </a></li>


                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>


