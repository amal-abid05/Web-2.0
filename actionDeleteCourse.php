<?php include "MySQLDatabase.php"; ?>
<?php include "CourseManager.php"; ?>


<?php 
if(isset($_GET['id'])){ 

$id= $_GET['id']; 


//BDD (initialize.php)
$mySQLDatabase = new MySQLDatabase();
$bdd = $mySQLDatabase->getConnection();

//Manager (initialize.php)
$courseManager = new CourseManager($bdd);

 $courseManager->deleteCourse($id);

}
?>

<?php header("Location: index.php"); ?>

