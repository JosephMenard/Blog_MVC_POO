<?php

namespace App\Controller;

use App\Factory\PDOFactory;
use App\Manager\UserManager;
use App\Route\Route;

class SecurityController  extends AbstractController
{
    #[Route('/loginForm', name: "login", methods: ["GET"])]
    public function loginForm(){
        $this->render("users/login.php", [
        ], "Se Connecter");
    }

    #[Route('/login', name: "login", methods: ["POST"])]
    public function login()
    {
        $formUsername = $_POST['email'];
        $formPwd = $_POST['password'];

        $userManager = new UserManager(new PDOFactory());
        $user = $userManager->getByUsername($formUsername);

        if (!$user) {
            header("Location: /?error=notfound");
            exit;
        }

        if ($user->passwordMatch($formPwd)) {
            $_SESSION['role'] = "admin";
            $_SESSION['username'] = $formPwd;
            header("Location: http://localhost:5656/", TRUE,301);
            exit();
        }

        header("Location: /?error=notfound");
        exit;
    }

    #[Route('/logOut', name: "login", methods: ["GET"])]
    public function logOut(){
        session_unset();
        session_destroy();
        $_SESSION = array();
        header("Location: http://localhost:5656/", TRUE,301);
        exit();
    }

    #[Route('/users', name: "login", methods: ["GET"])]
    public function showUsers()
    {
        $userManager = new UserManager(new PDOFactory());
        $users=$userManager->getAllUsers();
        $this->render("users/showUsers.php", [
            "users" => $users,
            "admin" => $admin = (new UserManager(new PDOFactory()))->isAdmin(),
        ], "titre de la page");
    }

    #[Route('/registerForm', name: "login", methods: ["GET"])]
    public function registerForm()
    {
        $this->render("users/register.php", [
        ], "S'inscrire");
    }

    #[Route('/register', name: "register", methods: ["POST"])]
    public function register(){
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $userManager = new UserManager(new PDOFactory());
        $userManager->addUser($firstName, $lastName, $email, $password);
        $_SESSION['role'] = "admin";
        $_SESSION['username'] = $password;
        header("Location: http://localhost:5656/", TRUE,301);
        exit();
    }



}