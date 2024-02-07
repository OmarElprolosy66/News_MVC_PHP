<?php
declare(strict_types=1);

namespace MVC\Controllers;

use MVC\Core\Helpers;
use MVC\Models\user;
use MVC\Core\Session;
use MVC\Core\controller;
use Respect\Validation\Validator as v;

class HomeController extends controller
{
    public function __construct()
    {
        Session::start();
    }

    public function index(): void
    {
        // database connection example
        $user = new user();
        $data = $user->getAllUsers();

        $this->view("home/index", ["title" => "Home index", "data" => $data]);
    }

    public function login(): void
    {
        $this->view("home/login", ["title" => "login"]);
    }

    public function logout(): void
    {
        Session::destroy();
    }

    public function postlogin(): void
    {
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';

        $emailValidator = V::email()->notEmpty();
        $passwordValidator = V::stringType()->length(3, null)->numericVal();

        if ($emailValidator->validate($email) && $passwordValidator->validate($password)) {
            $user = new user();
            $data = $user->getUser($_POST["email"], $_POST["password"]);

            // if ($data !== false) {
            // User exists in the database
            Session::set("user", $data);
            Helpers::redirect("user/index");
            exit();
            // } else {
            //     // User not found in the database
            //     echo "User not found.";
            // }
        } else {
            echo "Validation failed!";

            $emailErrors = $emailValidator->reportError($email);
            $passwordErrors = $passwordValidator->reportError($password);

            echo "<pre>";
            print_r($emailErrors);
            print_r($passwordErrors);
            echo "</pre>";
        }
    }
}