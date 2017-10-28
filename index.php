<?php
session_start();// Starting Session
// Storing Session
$login_session=$_SESSION['login_user'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php
    require_once('CourseManager.php');
    require_once('MySQLDatabase.php');

    ?>

  </head>

  <?php
  //BDD
  $mySQLDatabase = new MySQLDatabase();
  $db = $mySQLDatabase->getConnection();

  //Manager
  $courseManager = new CourseManager($db);


  ?>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href=""></a></li>
            <li><a href=""></a></li>
            <li><a href=""></a></li>
            <li><a href=""></a></li>
            <li><a href=""></a></li>
            <li><a href=""></a></li>
            <li><a href=""></a></li>
            <li><a href=""></a></li>
            <li><a href=""></a></li>
            <li><a href=""></a></li>
            <li><a href=""></a></li>
            <li><a href="">Welcome : <i><?php echo $login_session; ?></i></a></li>
            <li><a href="logout.php">Log Out</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      <div class="starter-template">
        <h1>All MOOCs</h1>
        <br>

        <?php

        // On récupère tout le contenu de la table course
        $courses = $courseManager->getListCourse();

        // On affiche chaque entrée une à une
        foreach ($courses as $course) { ?>

        <div class="row">
          <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
              <img src="<?php echo $course->getImage() ?>">
              <div class="caption">
                <h3><?php echo $course->getTitle() ?></h3>
                <p><?php echo $course->getShortDescription() ?></p>
                <p><strong> Level : <?php echo $course->getPlevel() ?></strong> </p>
              </div>

              <span class="btn-group">
                <a class="btn btn-info btn-sm" title="View" href="item.php?course_number=<?php echo $course->getId() ?>" data-primary="1" data-task="view"><i class="glyphicon glyphicon-info-sign"></i></a>
                <a class="btn btn-warning btn-sm" title="Edit" href="javascript:;" data-primary="1" data-task="edit"><i class="glyphicon glyphicon-edit "></i></a>
                <a class="btn btn-danger btn-sm" title="Remove" href="actionDeleteCourse.php?id=<?php echo $course->getId() ?>" data-primary="1" data-task="remove" data-confirm="Do you really want remove this entry?"><i class="glyphicon glyphicon-remove"></i></a>
              </span>
            </div>
          </div>

          <?php }  ?>

        </div>

        <br>
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plus-sign"></i> Add </button>



      <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Add a course</h4>
            </div>

            <div class="modal-body">


              <script type="text/javascript" src="js/ajaxAddCourse.js"></script>
              <form id="formAdd" class="form-horizontal" role="form" action="javascript:insertCourse()">
                <div class="form-group">
                  <label class="control-label col-sm-3" for="ptitle">Course Title </label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="ptitle" name="ptitle" placeholder="Title">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" for="descrip">Description </label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="descrip" name="descrip" placeholder="Description">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" for="plevel">Level </label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="plevel" name="plevel" placeholder="0">
                  </div>
                </div>



            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal" onclick="location.reload()">Close</button>
              <button type="submit" class="btn btn-default">Submit</button>
            </div>

            </form>
            <div id="addResp"></div>

          </div>

        </div>
      </div>

      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
