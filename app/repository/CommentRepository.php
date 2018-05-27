<?php
namespace SocialNetwork\app\repository;


class CommentRepository extends BaseRepository
{

    /**
     * @param int $id
     * @return mixed
     */
    function getComment($id)
    {
    
        $sql = "SELECT comment,  User.name, settings FROM Comment, User WHERE Comment.user_id=User.id and Comment.content_id=:id order by Comment.id desc";

        $stmt = $this->dbh->prepare($sql);

        $stmt->bindValue(':id', $id, \PDO::PARAM_INT);

        $stmt->execute();

        $obj = $stmt->fetchALL(\PDO::FETCH_CLASS, get_class($this));

        return $obj;
    }
}
