<?php include "MySQLDatabase.php"; ?>
<?php include "CommentManager.php"; ?>

<?php

if(isset($_REQUEST['comment']) && isset($_REQUEST['name']) && isset($_REQUEST['user_id']) && isset($_REQUEST['course_id']))
{

    $user_comment=$_REQUEST['comment'];
    $user_name=$_REQUEST['name'];
    $user_id=$_REQUEST['user_id'];
    $course_id=$_REQUEST['course_id'];

    $date = new DateTime();
    $time=$date->format('Y-m-d');

    $comment = new Comment(null, $user_comment, $time, $user_id, $course_id);


    //BDD
    $mySQLDatabase = new MySQLDatabase();
    $bdd = $mySQLDatabase->getConnection();

    //Manager
    $commentManager = new CommentManager($bdd);

    $commentManager->addComment($comment);

    echo "
        <div class='comment_div'>
            <p class='name'>$user_name</p>
            <p class='comment'> $user_comment</p>
            <p class='time'> $time </p>
        </div>
";

}

   ?>
