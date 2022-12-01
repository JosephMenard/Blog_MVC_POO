<?php

namespace App\Manager;

use App\Entity\Comment;

class CommentManager extends BaseManager
{

    /**
     * @param int $idPost
     * @return array
     * Retrieve all the comment
     */
    public function getComment(int $idPost): array
    {
        $query = $this->pdo->prepare("select * from Comment WHERE idPost = :idPost");
        $query->bindValue(':idPost', $idPost, \PDO::PARAM_INT);
        $query->execute();
        $comments = [];
        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $comments[] = new Comment($data);
        }
        return $comments;
    }

    /**
     * @param int $idPost
     * @param int $idComment
     * @return array
     * Retrieve the answer to a comment
     */
    public function getCommentAnswer(int $idPost, int $idComment): array
    {
        $query = $this->pdo->prepare("select * from Comment WHERE idPost = :idPost AND idComment = :idComment");
        $query->bindValue(':idPost', $idPost, \PDO::PARAM_INT);
        $query->bindValue(':idComment', $idComment, \PDO::PARAM_INT);
        $query->execute();
        $query->setFetcMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Entity\Post');

        $comments = [];
        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $comments[] = new Comment($data);
        }
        return $comments;
    }

    /**
     * @param int $id
     * @param string $content
     * Change values of an comment into the database
     */
    public function updateComment(int $id, string $content)
    {
        $query = $this->pdo->prepare("UPDATE Comment SET content = :text WHERE id = :id");
        $query->bindValue(':text', $content, \PDO::PARAM_STR_CHAR);
        $query->bindValue(':id', $id, \PDO::PARAM_INT);
        $query->execute();
    }


    /**
     * @param string $content
     * @param string $author
     * @param int $idUser
     * @param int $idPost
     * @param int|null $idComment
     * Add an comment into the database
     */
    public function insertComment(string $content, string $author, int $idUser, int $idPost, ?int $idComment)
    {
        $query = $this->pdo->prepare("INSERT INTO Comment (content, date, author, idUser, idPost, idComment) VALUES (:content, CURRENT_DATE(),:author, :idUser, :idPost, :idComment)");
        $query->bindValue(':content', $content, \PDO::PARAM_STR_CHAR);
        $query->bindValue(':author', $author, \PDO::PARAM_STR_CHAR);
        $query->bindValue(':idUser', $idUser, \PDO::PARAM_INT);
        $query->bindValue(':idPost', $idPost, \PDO::PARAM_INT);
        $query->bindValue(':idComment', $idComment, \PDO::PARAM_INT);
        $query->execute();
    }

    /**
     * @param int $id
     * Function delete a comment in the database
     */
    public function deleteComment(int $id)
    {
        $query = $this->pdo->prepare("DELETE FROM Comment WHERE id = :id");
        $query->bindValue(':id', $id, \PDO::PARAM_INT);
        $query->execute();
    }

}