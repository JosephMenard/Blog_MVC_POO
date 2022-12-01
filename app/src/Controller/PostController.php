<?php

namespace App\Controller;

use App\Factory\PDOFactory;
use App\Manager\PostManager;
use App\Manager\CommentManager;
use App\Manager\UserManager;
use App\Route\Route;

class PostController extends AbstractController
{
    #[Route('/', name: "homepage", methods: ["GET"])]
    public function home()
    {

        $manager = new PostManager(new PDOFactory());
        $posts = $manager->getAllPosts();

        $this->render("home.php", [
            "posts" => $posts,
            "admin" => $admin = (new UserManager(new PDOFactory()))->isAdmin(),
        ], "Home");
    }

    /**
     * @param $id
     * @param $truc
     * @param $machin
     * @return void
     */
    #[Route('/post/{id}', name: "OnePost", methods: ["GET"])]
    public function showOne($id)
    {
        $postManager = new PostManager(new PDOFactory());
        $commentManager = new CommentManager(new PDOFactory());
        $post = $postManager->getPostsById($id);
        $comments = $commentManager->getComment($id);
        $commentsAnswer = $commentManager->getComment($id);
        $this->render("post.php", [
            "post" => $post,
            "comments" => $comments,
            "commentsAnswer" => $commentsAnswer,
            "admin" => $admin = (new UserManager(new PDOFactory()))->isAdmin(),
        ], $post->getTitle());
    }

    #[Route('/post', name: "CommentForm", methods: ["GET"])]
    public function postForm(){
        $this->render("newPost.php", [
        ], "Post");
    }

    #[Route('/addPost', name: "newPost", methods: ["POST"])]
    public  function addPost(){
        $title = $_POST['title'];
        $content = $_POST['content'];
        $postManager = new PostManager(new PDOFactory());
        $postManager->insertPost($title, $content, 'test', 'Jules', 1);
        header("Location: http://localhost:5656/", TRUE,301);
        exit();

    }

    #[Route('/delPost/{id}', name: 'DeletePost', methods: ["GET"])]
    public function delPost($id){
        $postManager = new PostManager(new PDOFactory());
        $postManager->deletePost($id);
        header("Location: http://localhost:5656/", TRUE,301);
        exit();
    }

    #[Route('/update/{id}', name: 'UpdatePost', methods: ["GET"])]
    public function updateFormPost($id){
        $this->render("updatePost.php", [
            "id" => $id,
        ], "Modifier");
    }

    #[Route('/updatePost/{id}', name: "newComment", methods: ["POST"])]
    public function updatePost($id){
        $title = $_POST['title'];
        $content = $_POST['content'];
        $postManager = new PostManager(new PDOFactory());
        $postManager->updatePost($id, $content, $title, 'test');
        header("Location: http://localhost:5656/", TRUE,301);
        exit();
    }


}