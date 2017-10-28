<?php
session_start();// Starting Session
// Storing Session
$login_session=$_SESSION['login_user'];
$user_id=$_SESSION['user_id'];
//$login_session= "mariem@gmail.com";
if(isset($_GET['course_number'])) {
  $course_id = $_GET['course_number'];
}

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

    <link rel="stylesheet" type="text/css" href="css/comment_style.css">

    <?php
    require_once('CommentManager.php');
    require_once('CourseManager.php');
    require_once('MySQLDatabase.php');

    ?>
  </head>

  <body>

  <?php
  //BDD
  $mySQLDatabase = new MySQLDatabase();
  $db = $mySQLDatabase->getConnection();

  //Manager
  $commentManager = new CommentManager($db);
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
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      <div class="starter-template">

        <?php

        $course = $courseManager->getCourse($course_id);

        ?>

        <div class="row featurette">
          <div class="col-md-7 col-md-push-5">
            <h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span></h2>
            <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
            <br>
            <p class="lead"> <?php echo $course->getFullDescription() ?></p>
          </div>
          <div class="col-md-5 col-md-pull-7">
            <img class="featurette-image img-responsive center-block" src="<?php echo $course->getImage() ?>">
          </div>
        </div>



        <h1>Comment Here</h1>

        <script type="text/javascript" src="js/ajaxAddComment.js"></script>
        <form method="" action="javascript:insertComment()">
          <textarea id="comment" name="comment" placeholder="Write Your Comment Here....."></textarea>
          <input type="hidden" id="username" name="username" value="<?php echo $login_session ?>"/>
          <input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id ?>"/>
          <input type="hidden" id="course_id" name="course_id" value="<?php echo $course_id ?>"/>
          <br>
          <input type="submit" value="Post Comment">
        </form>

        <br>
        <div id="all_comments">

          <?php

          // On récupère tout le contenu de la table course
          $comments = $commentManager->getListComment($course_id);

          // On affiche chaque entrée une à une
          foreach ($comments as $comment) { ?>

            <div class="comment_div">
              <p class="name">Posted By:<?php echo $login_session ?></p>
              <p class="comment"><?php echo $comment->getCommentText() ?></p>
              <p class="time"><?php echo $comment->getPostTime() ?></p>
            </div>

            <?php
          }
          ?>
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
