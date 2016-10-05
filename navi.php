<?php
session_start();
?>
<nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
<br>
<!--
		<span align='center'>
                            <img alt="image" src="img/Batam.png" width='110' height='100' align='center'/>
                             </span>
							 TAX MONITORING SYSTEM
-->

            <ul class="nav" id="side-menu">
			<br>
                <?php 
                    if ( isset($_SESSION['level']) && $_SESSION['level']=="1" ) { // only for admin
                ?>
                <li>
                    <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Data Master</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li ><a href="mst_user.php">User</a></li>
                        <li ><a href="mst_merchant.php">Merchant</a></li>                        
                        <li ><a href="mst_device.php">Wajib Pajak</a></li>                        
                        <li ><a href="mst_kategori.php">Kategori Pajak</a></li>                      
                    </ul>
                </li>
                <?php
                    } elseif ( !isset($_SESSION) ) {
                        session_unset();
                        session_destroy();
                        location("index.php");
                    }
                ?>
                <li>
                    <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Laporan</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="tr_detail.php">Detail Transaksi</a></li>
                        <li><a href="rpt_harian.php">Laporan Harian</a></li>
                        <li><a href="rpt_bulanan.php">Laporan Bulanan</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="#"><i class="fa fa-desktop"></i> <span class="nav-label">Monitoring</span><span class="fa arrow"></span> </a>
					<ul class="nav nav-second-level">
                    
                        <li><a href="mon_devstatus.php">Status Perangkat</a></li>
                        
                    </ul>
                </li>
<!--                
				<li>
                    <a href="gallery.php"><i class="fa fa-picture-o"></i> <span class="nav-label">Gallery</span></a>
                    
                </li>
-->
               
                
               
            </ul>

        </div>
    </nav>
 
	
        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="">
                <div class="form-group">
                <!--    <input type="text" placeholder="Pencarian..." class="form-control" name="top-search" id="top-search"> -->
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Tax Monitoring System | Pemerintah Kota</span>
                </li>
                
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-user"></i><b class="caret"></b><!--<span class="label label-warning">16</span>-->
                    </a>
                    <ul class="dropdown-menu dropdown-messages">

                        <li>
                                <a href="index.php">                                
                                    <i class="fa fa-sign-out"></i> Log out
                                </a>
                        </li>   
                        <li>
                            <a href="reset_password.php">
                                <i class="fa fa-sign-out"></i> Reset Password
                            </a>
                        </li>   
                        <li class="divider"></li>                                               
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="#" class="pull-left">
                                    <!--<img alt="image" class="img-circle" src="img/a7.jpg">-->
                                </a>
                                <div class="media-body">
                                    <small class="pull-right">[<?php echo ($_SESSION['level']=="1") ? "Admin" : "Viewer";?>]</small>
                                    Logged as <strong><?php echo $_SESSION['user']; ?></strong>
                                    <small class="text-muted"></small>
                                </div>
                            </div>
                        </li>                        
                    </ul>
                </li>
            </ul>
        </nav> 
		</div>

