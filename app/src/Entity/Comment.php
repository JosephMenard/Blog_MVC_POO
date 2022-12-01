<?php

namespace App\Entity;


class Comment extends BaseEntity
{
    private int $id;
    private string $content;
    private string $date;
    private string $author;
    private int $idUser;
    private int $idPost;
    private ?int $idComment;


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Comment
     */
    public function setId(int $id): Comment
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $text
     * @return Comment
     */
    public function setContent(string $content): Comment
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     * @return Comment
     */
    public function setDate(string $date): Comment
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $author
     * @return Comment
     */
    public function setAuthor(string $author): Comment
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return int
     */
    public function getIdUser(): int
    {
        return $this->idUser;
    }

    /**
     * @param int $idUser
     * @return Comment
     */
    public function setIdUser(int $idUser): Comment
    {
        $this->idUser = $idUser;
        return $this;
    }

    /**
     * @return int
     */
    public function getIdPost(): int
    {
        return $this->idPost;
    }

    /**
     * @param int $idPost
     * @return Comment
     */
    public function setIdPost(int $idPost): Comment
    {
        $this->idPost = $idPost;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getIdComment(): ?int
    {
        return $this->idComment;
    }

    /**
     * @param int|null $idComment
     * @return Comment
     */
    public function setIdComment(?int $idComment): Comment
    {
        $this->idComment = $idComment;
        return $this;
    }


}