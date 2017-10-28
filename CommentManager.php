<?php
require_once('Comment.php');

class CommentManager
{

    private $_db; // Instance de PDO.

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }


    /**
     * @return array
     */
    public function getListComment($course_id)
    {
        // Retourne la liste de tous les courses.

        $comments = [];

        $req = $this->_db->query("SELECT * FROM comment where course_id=$course_id order by postTime desc");

        while ($res = $req->fetch())
        {
            //id, commentText, postTime, user, course
            $comments[] = new Comment($res['id'],$res['commentText'],$res['postTime'],
                $res['user_id'], $res['course_id']);
        }


        return $comments;
    }



    public function addComment(Comment $c)
    {
        // Préparation de la requête d'insertion.

        $req = $this->_db->prepare('INSERT INTO comment SET commentText = :commentText, postTime = :postTime, user_id = :user_id, course_id = :course_id');

        $req->bindValue(':commentText', $c->getCommentText());
        $req->bindValue(':postTime', $c->getPostTime());
        $req->bindValue(':user_id', $c->getUser());
        $req->bindValue(':course_id', $c->getCourse());


// Exécution de la requête.
        $req->execute();
    }


}