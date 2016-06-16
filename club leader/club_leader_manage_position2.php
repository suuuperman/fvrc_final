<!DOCTYPE html>
<html lang="en">
<?php 
	include('conn.php');
	session_start();
?>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>FVRC | Manage Accounts</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
     
	 <!--header start-->
      
 
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a href="club_leader_login.php" class="logo">Club <span class="lite">Leader</span></a>
            <!--logo end-->

            <div class="nav search-row" id="top_menu">
                <!--  search form start -->
                <ul class="nav top-menu">                    
                    <li>
                        <form class="navbar-form">
                            <input class="form-control" placeholder="Search" type="text">
                        </form>
                    </li>                    
                </ul>
                <!--  search form end -->                
            </div>

            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="img/avatar1_small.jpg">
                            </span>
                            <span class="username"><?php 
								echo $_SESSION['SESS_FIRST_NAME'];
							?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="club_leader_profile.php"><i class="icon_profile"></i> My Profile</a>
                            </li>

                            <li>
                                <a href="session_ender.php"><i class="icon_key_alt"></i> Log Out</a>
                            </li>
                           
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>        
      <!--header end-->
	
	  <?php
	include('conn.php');
		
		$sql=mysql_query("SELECT * FROM `accounts` WHERE id_no='$_GET[id]'"); 
		$sqlSecond=mysql_query("SELECT * FROM `volunteer_information` WHERE id_no='$_GET[id]'"); 
		$sql2=mysql_fetch_array($sql);
		$sqlSecond=mysql_fetch_array($sqlSecond);
		
		
		
	//header('location:assign_position.php');
		
	?>
	  
      <!-- edit-profile -->
                                  <div id="edit-profile" class="tab-pane">
                                    <section class="panel">                                          
                                          <div class="panel-body bio-graph-info">
                                              <h1> Profile Info</h1>
                                              <form class="form-horizontal" action="manage_position3.php" method="POST" role="form" >                                                  
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">ID No.</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" class="form-control" name="id_number" id="f-name"  value="<?php echo $sql2['id_no']; ?>">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Username</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" class="form-control" disabled="disabled" name="username" id="l-name"  value="<?php echo $sql2['username']; ?>" placeholder=" ">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Password</label>
                                                      <div class="col-lg-6">
                                                          <input type="password" class="form-control" disabled="disabled" id="l-name" value="<?php echo $sql2['password']; ?>" placeholder=" ">
                                                      </div>
                                                  </div>
                                                  
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Firstname</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" class="form-control" disabled="disabled" id="c-name" value="<?php echo $sqlSecond['firstname']; ?>" placeholder=" ">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Lastname</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" class="form-control" disabled="disabled" id="b-day" value="<?php echo $sqlSecond['lastname']; ?>" placeholder=" ">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Position</label>
                                                      <div class="col-lg-6">
                                                          <!--<input type="text" class="form-control" id="occupation" placeholder=" ">-->
														  
						<select class="form-control" id="occupation" name="position_types">
						<?php 
							if($sql2['position']=='fvrc president')
							{	?>
								<option value="member">Member</option>
								<option value="club leader">Club Leader</option>
								<option value="ntc president">NTC President</option>
						<?php 
							}
							if($sql2['position']=='ntc president'){
									
						?>
						<option value="member">Member</option>
						<option value="club leader">Club Leader</option>
						<option value="fvrc president">FVRC President</option>
						
						<?php
							}
							if($sql2['position']=='club leader'){
						?>
						<option value="member">Member</option>
						<option value="ntc president">NTC President</option>
						<option value="fvrc president">FVRC President</option>
						
						<?php
							}
							if($sql2['position']=='member'){
						?>
							<option value="club leader">Club Leader</option>
							<option value="ntc president">NTC President</option>
							<option value="fvrc president">FVRC President</option>	
						<?php		
							}
						?>
						
					</select>
                                                      </div>
                                                  </div>
                                                 
                                                  <div class="form-group">
                                                      <div class="col-lg-offset-2 col-lg-10">
                                                          <button type="submit" value="Submit" class="btn btn-primary">Submit</button>
                                                          <button type="button" class="btn btn-danger">Cancel</button>
                                                      </div>
                                                  </div>
                                              </form>
                                          </div>
                                      </section>
                                  </div>
					<!-- END -->

                      </section>
                  </div>
              </div>
			  
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section end -->
    <!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
    <script src="js/scripts.js"></script>


  </body>
</html>
