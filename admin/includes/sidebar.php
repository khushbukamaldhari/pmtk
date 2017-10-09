
<!-- START PAGE SIDEBAR -->
<div class="page-sidebar">
    <!-- START X-NAVIGATION -->
    <ul class="x-navigation">
        <li class="xn-logo">
            <a href="<?php echo ADMIN_URL; ?>">ATLANT</a>
            <a href="#" class="x-navigation-control"></a>
        </li>                                                                      
        <li class="xn-title">Navigation</li>
        <li>
            <a href="<?php echo ADMIN_URL; ?>"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>
        </li>
        <li class="xn-openable">
            <a href="#"><span class="fa fa-user"></span> <span class="xn-text">Users</span></a>
            <ul>
                <li><a href="<?php echo ADMIN_URL . 'manage_users.php?type=cook' ?>"><span class="xn-text">Cook / Chef</span></a></li>
                <li><a href="<?php echo ADMIN_URL . 'manage_users.php?type=taster' ?>"><span class="xn-text">Taster</span></a></li>
                <li><a href="<?php echo ADMIN_URL . 'manage_users.php?type=delivery' ?>"><span class="xn-text">Delivery Driver</span></a></li>
            </ul>
        </li>
    </ul>
    <!-- END X-NAVIGATION -->
</div>
<!-- END PAGE SIDEBAR -->
