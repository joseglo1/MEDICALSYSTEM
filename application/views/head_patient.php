<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient</title>
    <!-- Core CSS - Include with every page
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />  -->
    <?php
    echo link_tag("assets/plugins/bootstrap/bootstrap-3.4.1-dist/css/bootstrap.css");
    echo link_tag("assets/plugins/jQuery-Multiselect/dist/css/bootstrap-multiselect.css");
    echo link_tag("assets/font-awesome/css/font-awesome.css");
    echo link_tag("assets/plugins/pace/pace-theme-big-counter.css");
    echo link_tag("assets/css/style.css");
    echo link_tag("assets/css/main-style.css");
    ?>
    <!-- Page-Level CSS
    <link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" /> -->
    <?php
    echo link_tag("assets/plugins/dataTables/dataTables.bootstrap.css");
    ?>
    <style>
    .fa {
        font-size: 25px;
    }

    .starorange  {
        color: orange;
    }
    
	#calendar {

			font-family:Arial;

			font-size:12px;

	}

	#calendar caption {

			text-align:left;

			padding:5px 10px;

			background-color:#003366;

			color:#fff;

			font-weight:bold;

	}

	#calendar th {

			background-color:#006699;

			color:#fff;

			width:40px;

	}

	#calendar td {

			text-align:right;

			padding:2px 5px;

			background-color:silver;

	}

	#calendar .hoy {

		background-color:blue;
        color: #ffffff;

	}

    #calendar2 .hoy {

    background-color:blue;
    color: #ffffff;

    }
   
    </style>

</head>

<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url().'patient/home' ?>">
                    <img src="<?php echo base_url();?>assets/img/logo.png" alt="" />
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">
                
                <!-- Notificaciones -->
                <?php
                $nronotifications = 0;
                $mynot= "SELECT count(note) as notes FROM notification 
                            WHERE id_User = ".$this->session->userdata('iduser')." AND status=0;";
                $queryNote = $this->db->query($mynot);
                if ($queryNote->num_rows() > 0)
                {
                    $row = $queryNote->row();
                    $nronotifications = $row->notes;
                }
                if($nronotifications > 0) {
                ?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="top-label label label-danger"><?php echo $nronotifications ?></span><i class="fa fa-envelope fa-3x"></i>
                    </a>
                    
                    <ul class="dropdown-menu dropdown-messages">
                        <?php
                        $dinot= "SELECT * FROM notification WHERE id_User = ".$this->session->userdata('iduser')." 
                                AND status = 0;";
                        $queryListNotes = $this->db->query($dinot);
                        $listnotes = $queryListNotes->result_array();
                        //print_r($listnotes);
                        foreach($listnotes as $nt) {
                            $thedate = substr($nt['datenot'],0,10);
                        ?>

                        <li>
                            <a href="#">
                                <div>
                                    <strong><span class=" label label-success">You Have a New Message</span></strong>
                                    <span class="pull-right text-muted">
                                        <em><?php echo $thedate;?></em>
                                    </span>
                                </div>
                                <div><?php echo $nt['note'];?></div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <?php
                        }
                        ?>
                        <!--
                        <li>
                            <a href="#">
                                <div>
                                    <strong><span class=" label label-info">Jonney Depp</span></strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong><span class=" label label-success">Jonney Depp</span></strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                        -->
                    </ul>
                   
                </li>
                <?php
                }
                ?>
                <!--
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="top-label label label-success">4</span>  <i class="fa fa-tasks fa-3x"></i>
                    </a>
                    
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Register</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Attach Documents</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                        
                    </ul>
                    
                </li>
                -->
                <!-- 
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="top-label label label-warning">5</span>  <i class="fa fa-bell fa-3x"></i>
                    </a>
                    
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i>New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i>3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i>Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i>New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i>Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                        
                    </ul>
                    
                </li>
                -->

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-3x"></i>
                    </a>
                    <!-- dropdown user-->
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo site_url();?>patient/profile"><i class="fa fa-user fa-fw"></i>User Profile</a>
                        </li>
                        <!--
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i>Settings</a>
                        </li>
                    -->
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url();?>acceso/close"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                        </li>
                    </ul>
                    <!-- end dropdown-user -->
                </li>
                <!-- end main dropdown -->
            </ul>
            <!-- end navbar-top-links -->

        </nav>
        <!-- end navbar top -->

        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                            <div class="user-section-inner">
                                <?php 
                                    $userme = $this->session->userdata('iduser');
                                    if($userme>0)
                                    {
                                        $patienth = $this->Patient_model->get_user_patient($userme);
                                        //print_r($patienth[0]['id_Patient']);
                                       
                                        if($patienth[0]['picture']<>'') {
                                    ?> 
                                            <img src="<?php echo base_url().'upload/profile/'.$patienth[0]['picture']; ?>" alt="">
                                        <?php 
                                        }
                                        else 
                                        { 
                                        ?>
                                            <img src="../assets/img/user.jpg" alt="">
                                        <?php 
                                        }
                                    }
                                    else {
                                        echo "<img src='../assets/img/user.jpg' alt=''>";  
                                    } 
                                    ?>
                            </div>
                            <div class="user-info">
                                <?php
                                if($this->session->userdata('nameu')) {
                                $myname = explode(" ", $this->session->userdata('nameu'));
                                echo "<div>".$myname[0]."</div>";
                                }
                                else {
                                    echo "<div>Your <strong>Name</strong></div>";
                                }

                                 ?> 
                                <!-- <div>Jonny <strong>Deen</strong></div> -->
                                <div class="user-text-online">
                                    <?php 
                                    if($this->session->userdata('nameu')) {
                                     ?>
                                    <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                                <?php }
                                    else { ?>
                                      <span class="user-circle-online btn btn-danger btn-circle "></span>&nbsp;Offline  
                                <?php  } ?>
                                </div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                    <li class="sidebar-search">
                        <!-- search section-->
                        <div class="input-group custom-search-form">
                            <!--
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            -->
                        </div>
                        <!--end search section-->
                    </li>
                    <?php 
                        $meactive = $this->session->userdata('active');
                    ?>
                    <!--
                    <li class="">
                        <a href="<?php //echo base_url().'doctor/register' ?>"><i class="fa fa-dashboard fa-fw"></i>Register Form</a>
                    </li> -->

                    <?php
                    $isactive = $this->session->userdata('active');
                    //if($this->session->userdata('active')) { 
                        //if($isactive >= 0) { ?> 
                            <!-- <li>
                                <a href="<?php //cho base_url().'patient/documents' ?>"><i class="fa fa-flask fa-fw"></i>Documents</a>
                            </li>
                        -->
                        <?php 
                        //} 
                        //echo "<!-- <li class='selected'> -->";
                        //if($isactive >= 1) { ?> 
                            <li>
                            <a href="<?php echo base_url().'patient/home' ?>"><i class="fa fa-medkit"></i>&nbsp;&nbsp;Doctors</a>
                            </li>
                            <li>
                            <a href="<?php echo base_url().'booking/patient_booking' ?>"><i class="fa fa-calendar"></i>&nbsp;&nbsp;Appointments</a>
                            </li>
                            <li>
                            <a href="<?php echo base_url().'booking/booking_pay' ?>"><i class="fa fa-money"></i>&nbsp;&nbsp;Pay with Payapl</a>
                            </li>
                            <li>
                            <a href="<?php echo base_url().'booking/patient_booking_pay' ?>"><i class="fa fa-clipboard"></i>&nbsp;&nbsp;Report Payment</a>
                            </li>
                            <li>
                            <a href="<?php echo base_url().'booking/patient_booking_eval' ?>"><i class="fa fa-clipboard"></i>&nbsp;&nbsp;Calificate Appointment</a>
                            </li>
                        <?php 
                        //
                    //} 
                        ?>
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->