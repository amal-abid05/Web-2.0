<?php
require_once('Course.php');


/** GestionCourse **/
class CourseManager
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


    public function getCourse($id)
    {
        // Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Course.
        $id = (int) $id;

        $req = $this->_db->query('SELECT * FROM course WHERE id ='.$id);
        $res = $req->fetch();


        //id, title, level, field, shortDescription, fullDescription, path, duration, rating, image
        return new Course($res['id'],$res['title'],$res['plevel'],
            $res['field'], $res['shortDescription'],$res['fullDescription'],
            $res['path'],$res['duration'], $res['rating'],$res['image']);

    }

    /**
     * @return array
     */
    public function getListCourse()
    {
        // Retourne la liste de tous les courses.

        $courses = [];

        $req = $this->_db->query('SELECT * FROM course');

        while ($res = $req->fetch())
        {
            $courses[] = new Course($res['id'],$res['title'],$res['plevel'],
                $res['field'], $res['shortDescription'],$res['fullDescription'],
                $res['path'],$res['duration'], $res['rating'],$res['image']);
        }


        return $courses;
    }


    public function addCourse(Course $c)
    {
        // Préparation de la requête d'insertion.

        $req = $this->_db->prepare('INSERT INTO course SET title = :title, plevel = :plevel, field = :field, shortDescription = :shortDescription, fullDescription = :fullDescription, path = :path, duration = :duration, rating = :rating, image = :image');

        $req->bindValue(':title', $c->getTitle(), PDO::PARAM_STR);
        $req->bindValue(':plevel', $c->getPlevel(), PDO::PARAM_INT);
        $req->bindValue(':field', $c->getField(), PDO::PARAM_STR);
        $req->bindValue(':shortDescription', $c->getShortDescription(), PDO::PARAM_STR);
        $req->bindValue(':fullDescription', $c->getFullDescription(), PDO::PARAM_STR);
        $req->bindValue(':path', $c->getPath(), PDO::PARAM_STR);
        $req->bindValue(':duration', $c->getDuration());
        $req->bindValue(':rating', $c->getRating());
        $req->bindValue(':image', $c->getImage(), PDO::PARAM_STR);


// Exécution de la requête.
        $req->execute();
    }

        //PARAM_INT if int



    public function deleteCourse($id)
    {
        // Exécute une requête de type DELETE.
        $this->_db->exec('DELETE FROM course WHERE id = '.$id);
    }

    /*
    public function deleteCourse($course)
    {
        // Exécute une requête de type DELETE.
        $this->_db->exec('DELETE FROM course WHERE id = '.$course->getId());
    }
*/

    public function updateCourse(Course $course)
    {
        // Prépare une requête de type UPDATE.
        $req = $this->_db->prepare('UPDATE course SET title = :title, shortDescription = :shortDescription, plevel = :plevel WHERE id = :id');
        // Assignation des valeurs à la requête.
        $req->bindValue(':title', $course->getTitle(), PDO::PARAM_STR);
        $req->bindValue(':shortDescription', $course->getShortDescription(), PDO::PARAM_STR);
        $req->bindValue(':plevel', $course->getPlevel(), PDO::PARAM_INT);
        $req->bindValue(':id', $course->getId(), PDO::PARAM_INT);
        // Exécution de la requête.
        $req->execute();
    }
}
?>