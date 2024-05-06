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
    <!--page level css -->
    <link rel="stylesheet" href="vendors/Buttons/css/buttons.css" />
    <link rel="stylesheet" href="css/pages/advbuttons.css" />
    <!--end of page level css-->
    <!--page level css -->
    <link href="vendors/jasny-bootstrap/css/jasny-bootstrap.css" rel="stylesheet" />
    <link href="vendors/iCheck/css/all.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="vendors/datatables/css/dataTables.bootstrap.css" />
    <link href="css/pages/tables.css" rel="stylesheet" type="text/css" />
    <link href="css/pages/icon.css" rel="stylesheet" type="text/css" /><link href="vendors/modal/css/component.css" rel="stylesheet" />
    <link href="css/pages/advmodals.css" rel="stylesheet" />
    <!--end of page level css-->


    <script>
function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('txt').innerHTML =
  h + ":" + m + ":" + s;
  var t = setTimeout(startTime, 500);
}
function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}
</script>
<script>
var text = ["Avilable", "UNavilable"];
var counter = 0;
var elem = document.getElementById("change1");
var inst = setInterval(change, 1000);

function change() {
  elem.innerHTML = text[counter];
  counter++;
  if (counter >= text.length) {
    counter = 0;
    // clearInterval(inst); // uncomment this if you want to stop refreshing after one cycle
  }
}
</script>
</head>

<body class="skin-josh" onload="startTime()">
    <header class="header">
        <a href="index.php" class="logo">
          <p>CLMS</p>
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
            <div class="panel panel-blue" style="width:200px">
                <div class="panel-heading">
                    <h4 class="panel-title"></h4>
                    <span class="pull-right">

                    </span>
                </div>
                <div class="panel-body">
                    <div id="txt"></div>
                    <div id="change1"></div>
                </div>
            </div>
            <div class="col-md-6">

            </div>
            <section class="content paddingleft_right15">
                <div class="row">

                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="desktop" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true"></i></i> Computers
                            </h4>
                            <div id="txt"></div>
                        </div>
                        <br />
                        <div class="panel-body">
                            <table class="table table-bordered " id="table">
                                <thead>
                                    <tr class="filters">
                                        <th><h3>Coputer Name</h3></th>

                                        <th><h3>Complaints</h3></th>
                                        <th><h3>Action</h3></th>
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
                                       <td style="text-align:center;"><?php echo $row['comment'];?></td>
                                    <td style="text-align:center;margin: auto;">   <li>
                                           <a href="complaint1.php?id=<?php echo $row['id'];?>" class="button button-pill button-success" style="width:80px;text-align:center;">Done</a>
                                       </li></td>
                                    </tr>
                                    <?php
       					  $i++;}

                      } ?>




                                </tbody>
                            </table>
                            <!-- Modal for showing delete confirmation -->
                            <div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
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
                                            <a href="deleted_users.html" class="btn btn-danger">Delete
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
    <!-- global js -->
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

    <!-- begining of page level js -->
    <script type="text/javascript" src="vendors/Buttons/js/scrollto.js"></script>
    <script type="text/javascript" src="vendors/Buttons/js/buttons.js"></script>
    <!--social dashboard-->
    <script type="text/javascript">
    $({
        someValue: 0
    }).animate({
        someValue: Math.floor(Math.random() * 3000)
    }, {
        duration: 3000,
        easing: 'swing', // can be anything
        step: function() { // called on every step
            // Update the element's text with rounded-up value:
            $('.count').text(commaSeparateNumber(Math.round(this.someValue)));
        }
    });

    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
        }
        return val;
    }
    </script>
    <!--social buttons-->
    <script type="text/javascript">
    $(function() {
        var all_classes = "";
        var timer = undefined;
        $.each($('li', '.social-class'), function(index, element) {
            all_classes += " btn-" + $(element).data("code");
        });
        $('li', '.social-class').mouseenter(function() {
            var icon_name = $(this).data("code");
            if ($(this).data("icon")) {
                icon_name = $(this).data("icon");
            }
            var icon = "<i class='fa fa-" + icon_name + "'></i>";
            $('.btn-social', '.social-sizes').html(icon + "Sign in with " + $(this).data("name"));
            $('.btn-social-icon', '.social-sizes').html(icon);
            $('.btn', '.social-sizes').removeClass(all_classes);
            $('.btn', '.social-sizes').addClass("btn-" + $(this).data('code'));
        });
        $($('li', '.social-class')[Math.floor($('li', '.social-class').length * Math.random())]).mouseenter();
    });
    </script>
    <!-- end of page level js -->
</body>

</html>
