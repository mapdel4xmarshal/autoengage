<?php if (session_status() == PHP_SESSION_NONE){
    session_start();
}
?>
<!DOCTYPE html>
<html  ng-app="autoengage" ng-controller = "AppController as mainCtrl">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>AutoEngage.Social</title>
<link href="resources/Bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="resources/custom/custom.css" rel="stylesheet">
<link href="resources/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="resources/animate.css/animate.min.css" rel="stylesheet">
<!-- bootstrap-progressbar -->
<link href="resources/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
<link href="modules/user/login/login.css" rel="stylesheet">
</head>

    <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-facebook-square"></i> <span>FB Page Admin</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="images/loading2.gif" ng-src="{{mainCtrl.userData.picture}}" alt="..." class="img-square profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2 ng-bind='mainCtrl.userData.firstName + " " + mainCtrl.userData.lastName | uppercase | limitTo : 17'></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <hr>
                <ul class="nav side-menu">
                  <li><a href="#/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                  <li><a><i class="fa fa-cogs"></i> Tools <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="viral.html">Engaging Posts</a></li>
                      <li><a href="composer.html">Post Composer</a></li>
                      <li><a href="index3.html">Dashboard3</a></li>
                    </ul>
                  </li>
                  
                  <li>{{pageID}}
                      <a><i class="fa fa-files-o fa-fw"></i> Managed Pages <span style="margin-left:10px;" class="badge" ng-bind="mainCtrl.managedPages.length"></span><span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                            <li ng-repeat="page in mainCtrl.managedPages"><a ng-href="#page/{{page.facebookPageID}}" title="Category : {{page.category}}">{{page.pageName | limitTo : 30}}</a></li>
                      </ul>
                      
                  </li>
                  
                    
                </ul>
              </div>
           
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
  <div class="nav_menu">
    <nav class="" role="navigation">
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>

      <ul class="nav navbar-nav navbar-right">
        <li class="">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="images/loading2.gif" ng-src="{{mainCtrl.userData.picture}}" alt=""><span id=''></span>
              <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">                    
            <li>
              <a href="javascript:;">
                <span class="badge bg-red pull-right">50%</span>
                <span>Settings</span>
              </a>
            </li>
            <li>                        
                <a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
          </ul>
        </li>

        <li role="presentation" class="dropdown">
          <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-envelope-o"></i>
            <span class="badge bg-green">1</span>
          </a>
          <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
            <li>
              <a>
                <span class="image"><img ng-src="" alt="Profile Image" /></span>
                <span>
                  <span>John Smith</span>
                  <span class="time">3 mins ago</span>
                </span>
                <span class="message">
                  Film festivals used to be do-or-die moments for movie makers. They were where...
                </span>
              </a>
            </li>
            <li>
              <div class="text-center">
                <a>
                  <strong>See All Alerts</strong>
                  <i class="fa fa-angle-right"></i>
                </a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</div>
        <!-- /top navigation -->

        <!-- page content -->
          <div class="right_col" role="main">      
           
            
          <div class="row">
              <div class="row">

                <div class="container">
                    <div class="row">  
                            <?php if(!isset($_SESSION['fb_access_token'])){
                                   echo '<div fb-login></div>';
                            }?>
                        </div>
                </div> 

          </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <!-- page content -->
                <ng-view></ng-view>
            </div>

          </div>  
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
              <cool-Directive></cool-Directive>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    
</body>

<script src="resources/angular.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.5/angular-route.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"> </script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.10/angular-sanitize.js"></script>
<script type="text/javascript" src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
<script type="text/javascript" src="resources/Bootstrap/dist/js/bootstrap.min.js"></script>
<script src="resources/nprogress/nprogress.js"></script>
<script src="resources/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script type="text/javascript" src="services/appconfig.js"></script>
<script type="text/javascript" src="services/page.js"></script>
<script type="text/javascript" src="filters/page.js"></script>
<script type="text/javascript" src="modules/autoengage.js"></script>
<script type="text/javascript" src="modules/routehandler.js"></script>
<script type="text/javascript" src="modules/user/user.js"></script>
<script type="text/javascript" src="modules/page/page.js"></script>
<script type="text/javascript" src="resources/custom/custom.js"></script>
</html>
    
