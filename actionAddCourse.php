<?php include "MySQLDatabase.php"; ?>
<?php include "CourseManager.php"; ?>


<?php
if(isset($_REQUEST['ptitle']) && isset($_REQUEST['descrip']) && isset($_REQUEST['plevel'])){

    $ptitle		= $_REQUEST['ptitle'];
    $descrip	= $_REQUEST['descrip'];
    $plevel 	= $_REQUEST['plevel'];

    $course = new Course(null, $ptitle, $plevel, "", $descrip, "", "", 0.0, 0.0, "image/default.jpg");




//BDD
    $mySQLDatabase = new MySQLDatabase();
    $bdd = $mySQLDatabase->getConnection();

//Manager
    $courseManager = new CourseManager($bdd);

    $courseManager->addCourse($course);

    echo $ptitle;
} else {
    echo 'Error! Please fill all fileds!';
}
?>


