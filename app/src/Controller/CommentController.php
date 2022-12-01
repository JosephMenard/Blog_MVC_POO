<?php

namespace App\Controller;

use App\Factory\PDOFactory;
use App\Manager\CommentManager;
use App\Route\Route;

class CommentController extends AbstractController
{
    #[Route('/comment/{idPost}/{idComment}', name: "CommentForm", methods: ["GET"])]
    public function commentForm($idPost, $idComment){
        $this->render("newComment.php", [
            "postId" => $idPost,
            "postComment" => $idComment,
        ], "Comment");
    }

    #[Route('/addComment/{idPost}/{idComment}', name: "newComment", methods: ["POST"])]
    public  function addComment($idPost, $idComment){
        $content = $_POST['content'];
        $commentManager = new CommentManager(new PDOFactory());
        if ($idComment == 0)
            $commentManager->insertComment($content, 'Jules', 1, $idPost, null);
        else
            $commentManager->insertComment($content, 'Jules', 1, $idPost, $idComment);
        header("Location: http://localhost:5656/post/".$idPost,TRUE,301);
        exit();

    }

    #[Route('/delComment/{idPost}/{id}', name: 'DeleteComment', methods: ["GET"])]
    public function delComment($idPost, $id){
        $commentManager = new CommentManager(new PDOFactory());
        $commentManager->deleteComment($id);
        header("Location: http://localhost:5656/post/".$idPost,TRUE,301);
        exit();
    }

    #[Route('/update/{idPost}/{idComment}', name: 'DeleteComment', methods: ["GET"])]
    public function updateForm($idPost, $idComment) {
        $this->render("updateComment.php", [
            "postId" => $idPost,
            "postComment" => $idComment,
        ], "Modifier");
    }

    #[Route('/updateComment/{idPost}/{idComment}', name: "newComment", methods: ["POST"])]
    public  function updateComment($idPost, $idComment){
        $content = $_POST['content'];
        $commentManager = new CommentManager(new PDOFactory());
        $commentManager->updateComment($idComment, $content);
        header("Location: http://localhost:5656/post/".$idPost,TRUE,301);
        exit();

    }

}