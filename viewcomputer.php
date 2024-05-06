<?php
session_start();
include "config.php";
if(!(isset($_SESSION['uname']) && $_SESSION['uname']!=''))
{
    header('Location:login.php');
}
$result=mysqli_query($con,"select * FROM computer_info");

  ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CLMS</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- global css -->
    <link href="css/app.css" rel="stylesheet" type="text/css" />
    <!-- end of global css -->
    <!--page level css -->
    <link href="vendors/fullcalendar/css/fullcalendar.css" rel="stylesheet" type="text/css" />
    <link href="css/pages/calendar_custom.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" media="all" href="vendors/bower-jvectormap/css/jquery-jvectormap-1.2.2.css" />
    <link rel="stylesheet" href="vendors/animate/animate.min.css">
    <link rel="stylesheet" type="text/css" href="vendors/datetimepicker/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="css/pages/only_dashboard.css" />
    <link href="css/pages/icon.css" rel="stylesheet" type="text/css" />
    <!--end of page level css-->
    <!--page level css -->
    <link href="vendors/jasny-bootstrap/css/jasny-bootstrap.css" rel="stylesheet" />
    <link href="vendors/iCheck/css/all.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="vendors/datatables/css/dataTables.bootstrap.css" />
    <link href="css/pages/tables.css" rel="stylesheet" type="text/css" />
    <link href="css/pages/icon.css" rel="stylesheet" type="text/css" /><link href="vendors/modal/css/component.css" rel="stylesheet" />
    <link href="css/pages/advmodals.css" rel="stylesheet" />
    <!--end of page level css-->
</head>

<body class="skin-josh">
    <header class="header">
        <a href="index.php" class="logo">
            <img src="img/logo6.png" alt="Logo" height="50" width="242">
        </a>
         <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <!-- top -->
            <?php
               include "top.php";
             ?>
            <!-- end of top -->
        </nav>
    </header>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <!-- Right side column. Contains the navbar and content of the page -->
         <?php
            include "side-menu.php";
          ?>

        <!-- end of side-bar -->

        <!-- right-side -->
        <aside class="right-side">
            <!-- Main content -->
            <section class="content-header">


            </section>
            <section class="content paddingleft_right15">
                <div class="row">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Computer List
                            </h4>
                        </div>
                        <br />
                        <div class="panel-body">
                            <table class="table table-bordered " id="table">
                                <thead>
                                    <tr class="filters">
                                        <th>Coputer Name</th>
                                        <th>OS-info</th>
                                        <th>
                                            Processor
                                        </th>
                                        <th>Ram</th>
                                        <th>Storage</th>
                                        <th>Keyboard</th>
                                        <th>Mouse</th>
                                        <th>Monitor</th>
                                        <th>Cabinet</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
				  if(mysqli_num_rows($result)>0){
					  $i=0;
					  while($row=mysqli_fetch_array($result)){
				  ?>
                                    <tr>
                                      <td style="text-align:center;"><?php echo $row['computer_name'];?></td>
                                      <td style="text-align:center;"><?php echo $row['os_info'];?></td>
                                      <td style="text-align:center;"><?php echo $row['processor'];?></td>
                                      <td style="text-align:center;"><?php echo $row['ram'];?></td>
                                      <td style="text-align:center;"><?php echo $row['storage'];?></td>
                                      <td style="text-align:center;"><?php
if($row['keyboard'] == 1)
{
  echo "Yes";
}
else {
  echo "No";
} ?> </td>
<td style="text-align:center;"> <?php if($row['mouse'] == 1)
{
  echo "Yes";
}
else {
  echo "No";
} ?> </td>
<td style="text-align:center;"><?php
if($row['monitor'] == 1)
{
  echo "Yes";
}
else {
  echo "No";
} ?> </td>
<td style="text-align:center;"><?php
if($row['cabinet'] == 1)
{
  echo "Yes";
}
else {
  echo "No";
}
?></td>
                                      <td>

                                          <div class="col-lg-2 col-md-3 col-sm-3 col-xs-6 text-left" style="margin:10px">
                                            <a href="edit_data.php?id=<?php echo $row['id'];?>">
                                                  <i class="livicon" data-name="edit" data-size="40" data-c="#f56954" data-hc="#f56954" data-loop="true" title="edit"></i> </a>

                                          </div>




                                            <!-- <div class="col-lg-2 col-md-3 col-sm-3 col-xs-6 text-right">
                                              <a href="#" data-toggle="modal" data-target="#delete_confirm">
                                                <i class="livicon" data-name="trash" data-size="40" data-c="#f56954" data-hc="#f56954" data-loop="true" title="delete user"></i>
                                              </a>
                                            </div> -->
                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-6 text-center" style="margin:10px">
                                             <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this item?');">
                                                <i class="livicon" data-name="trash" data-size="40" data-c="#f56954" data-hc="#f56954" data-loop="true" title="delete user"></i>
                                              </a>

                                            <!-- </div>
                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-6 text-right 12" style="margin:10px" >
                                                <i class="livicon" data-name="checked-off" data-size="40" data-c="#f56954" data-hc="#f56954" data-loop="true"></i>
                                            </div> -->

                                          </td>
                                    </tr>
                                    <?php
       					  $i++;}} ?>

                                </tbody>
                            </table>
                            <!-- Modal for showing delete confirmation -->
                            <!-- <div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="user_delete_confirm_title">
                                                Delete User
                                            </h4>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure to delete this user? This operation is irreversible.

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            <button onclick="delete.php" class="btn btn-danger">Delete</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- start of edit modal -->


                            <!-- end of edit modal -->
                        </div>
                    </div>
                </div>
                <!-- row-->
            </section>

        </aside>
        <!-- end of right-side>
    </div>
    <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top" data-toggle="tooltip" data-placement="left">
        <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
    </a>
  -->
    <script src="js/app.js" type="text/javascript"></script>
    <!-- end of global js -->
    <!-- begining of page level js -->
    <!-- EASY PIE CHART JS -->
    <script src="vendors/jquery.easy-pie-chart/js/easypiechart.min.js"></script>
    <script src="vendors/jquery.easy-pie-chart/js/jquery.easypiechart.min.js"></script>
    <script src="js/jquery.easingpie.js"></script>
    <!--end easy pie chart -->
    <!--for calendar-->
    <script src="vendors/moment/js/moment.min.js" type="text/javascript"></script>
    <script src="vendors/fullcalendar/js/fullcalendar.min.js" type="text/javascript"></script>
    <!--   Realtime Server Load  -->
    <script src="vendors/flotchart/js/jquery.flot.js" type="text/javascript"></script>
    <script src="vendors/flotchart/js/jquery.flot.resize.js" type="text/javascript"></script>
    <!--Sparkline Chart-->
    <script src="vendors/sparklinecharts/jquery.sparkline.js"></script>
    <!-- Back to Top-->
    <script type="text/javascript" src="vendors/countUp.js/js/countUp.js"></script>
    <!--   maps -->
    <script src="vendors/bower-jvectormap/js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="vendors/bower-jvectormap/js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="vendors/chartjs/Chart.js"></script>
    <script type="text/javascript" src="vendors/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <!--  todolist-->
    <script src="js/pages/todolist.js"></script>
    <script src="js/pages/dashboard.js" type="text/javascript"></script>
    <!-- end of page level js -->


</body>

</html>
