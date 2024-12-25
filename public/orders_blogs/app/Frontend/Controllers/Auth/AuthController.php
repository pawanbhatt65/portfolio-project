<?php

namespace App\Frontend\Controllers\Auth;

use App\Frontend\Controllers\AbstractController;
use App\Frontend\Repository\Auth\AuthRepository as AuthAuthRepository;

class AuthController extends AbstractController
{
    public function __construct(AuthAuthRepository $authRepository)
    {
        parent::__construct($authRepository);
    }

    // register page
    public function register()
    {
        $check_login = $this->authRepository->isLoggedIn();
        if ($check_login) {
            header("Location: index.php?page=user/dashboard");
            die();
        }
        $this->render("pages/register", [
            'errors' => '',
        ]);
    }
    // user data store
    public function storeRegisterUser()
    {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $name = @(string) ($_POST['name'] ?? "");
            $email = @(string) ($_POST['email'] ?? "");
            $password = @(string) ($_POST['password'] ?? "");
            $cPassword = @(string) ($_POST['cpassword'] ?? "");

            // Validate Name
            if (empty($name)) {
                $errors[] = "Name field is required!";
            }

            // Validate Email
            if (empty($email)) {
                $errors[] = "Email field is required!";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid email format!";
            }

            // Validate Password
            if (empty($password)) {
                $errors[] = "Password field is required!";
            }

            // Validate Confirm Password
            if (empty($cPassword)) {
                $errors[] = "Confirm password is required!";
            }

            // Password Matching & Strength Validation
            if (!empty($password) && !empty($cPassword)) {
                $validatePassword = $this->authRepository->strictPassword($password, $cPassword);
                // var_dump($validatePassword);
                // die();
                if ($validatePassword['message'] !== "success") {
                    // var_dump($validatePassword['message']);
                    $errors[] = $validatePassword['message']; // Add error from password validator
                    // var_dump($errors[0]);
                    // die();
                    $errors = $errors[0];
                    // var_dump($errors);
                }
            }

            // weather email already exists or not
            $is_exists = $this->authRepository->isEmailExists($email);
            // var_dump($is_exists);
            // die();

            if ($is_exists) {
                $errors[] = "Email already exists!";
            }

            // password bycrpt  for security
            $bcrypt_password = $this->authRepository->passwordBcrypt($password);

            // If there are no errors, proceed to save the user
            if (empty($errors)) {
                // Here you can save user data in the database (Example: $this->authRepository->saveUser(...))
                // For now, show success message.
                // echo "User registered successfully!";
                $this->authRepository->userStore($name, $email, $bcrypt_password);
                header("Location: index.php");
                return;
            }
        }
        // Re-render the register form with errors
        $this->render("pages/register", [
            'errors' => $errors,
        ]);
    }

    // login page
    public function login()
    {
        $check_login = $this->authRepository->isLoggedIn();
        if ($check_login) {
            header("Location: index.php?page=user/dashboard");
            die();
        }
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = @(string) ($_POST['email'] ?? "");
            $password = @(string) ($_POST['password'] ?? "");
            if (empty($email)) {
                $errors[] = "Email is required!";
            }
            if (empty($password)) {
                $errors[] = "Password is required!";
            }
            if (empty($errors)) {
                $isEmailExists = $this->authRepository->isEmailExists($email);
                // var_dump($isEmailExists);
                // die();
                if (!$isEmailExists) {
                    $errors[] = "User not registered with us!";
                }
            }
            if (empty($errors)) {
                $is_login = $this->authRepository->loginHandler($email, $password);
                if ($is_login) {
                    header("Location: index.php?page=user/dashboard");
                    return;
                }
            }
        }
        $this->render('pages/login', [
            'errors' => $errors,
        ]);
    }

    // logout function
    public function logout()
    {
        $this->authRepository->logout();
        header("Location: index.php");
    }
}
