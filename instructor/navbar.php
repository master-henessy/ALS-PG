<?php
require('dbconnections.php');
?>


<head>

  <title>ALS FMS | Login</title>
  <?php include('header.php'); ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <img src="../img/banner.png" style="width: 230px; height: 40px;"><a class="navbar-brand" href="home.php"></a>




    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="home.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Orders">
          <a class="nav-link" href="students.php">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Manage Students</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Orders">
          <a class="nav-link" href="grades.php">
            <i class="fa fa-fw fa-bar-chart"></i>
            <span class="nav-link-text">Manage Grades</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Accounts" >
          <a class="nav-link" href="schedules.php">
            <i class="fa fa-fw fa-calendar"></i>
            <span class="nav-link-text">Manage Schedules</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Reports">
          <a class="nav-link" href="reports.php">
            <i class="fa fa-fw fa-book"></i>
            <span class="nav-link-text">Reports</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Help">
          <a class="nav-link" href="help.php">
            <i class="fa fa-fw fa-question-circle"></i>
            <span class="nav-link-text">Help Guides</span>
          </a>
        </li>

      </ul>

        <ul class="navbar-nav ml-auto">

              <li class="nav-item">
                <a class="nav-link" href="#">
                <i class="fa fa-fw fa-calendar"></i> School Year <?php echo $sy; ?></a>
            </li>

        

            <li class="nav-item">
                <a class="nav-link" href="reminders.php">
                <i class="fa fa-fw fa-bell"></i> Reminders</a>
            </li>

             <li class="nav-item">
                <a class="nav-link" href="profile.php">
                <i class="fa fa-fw fa-user-circle"></i> <?php echo ucwords($_SESSION['usertype']); ?> <?php echo ucwords($_SESSION['Username']); ?>  </a>
            </li>

           <!--Logout Button-->
            <li class="nav-item">
                <a class="nav-link" href="logout.php">
                <i class="fa fa-fw fa-sign-out"></i> Logout</a>
            </li>
        </ul>




    </div>
  </nav>
