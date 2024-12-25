<?php

namespace App\Admin\Controllers\AdminAuthController;

use App\Admin\Controllers\AdminAbstractController;
use App\Admin\Repository\AdminAuthRepository\AdminAuthRepository;

class AdminAuthController extends AdminAbstractController
{
    public function __construct(AdminAuthRepository $adminAuthRepository)
    {
        parent::__construct($adminAuthRepository);
    }
    // admin register function
    public function adminRegister()
    {
        $check_login = $this->adminAuthRepository->isLoggedIn();
        if ($check_login) {
            header("Location: index.php?route=admin/dashboard");
            die();
        }
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = @(string) ($_POST['name'] ?? "");
            $email = @(string) ($_POST['email'] ?? "");
            $password = @(string) ($_POST['password'] ?? "");
            $cpassword = @(string) ($_POST['cpassword'] ?? "");
            // var_dump($name);
            // die();
            if (empty($name)) {
                $errors[] = "Name field is required!";
                // exit();
            }
            if (empty($email)) {
                $errors[] = "Email field is required!";
            }
            if (empty($password)) {
                $errors[] = "Password field is required!";
            }
            if (empty($cpassword)) {
                $errors[] = "Confirm password field is required!";
            }
            // Password Matching & Strength Validation
            if (empty($errors)) {
                $validatePassword = $this->adminAuthRepository->strictPassword($password, $cpassword);
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

            if (empty($errors)) {
                // weather email already exists or not
                $is_exists = $this->adminAuthRepository->isEmailExists($email);
                // var_dump($is_exists);
                // die();

                if ($is_exists) {
                    $errors[] = "Email already exists!";
                }
            }

            // If there are no errors, proceed to save the user
            if (empty($errors)) {
                // password bycrpt  for security
                $bcrypt_password = $this->adminAuthRepository->passwordBcrypt($password);
                // Here you can save user data in the database (Example: $this->adminAuthRepository->saveUser(...))
                // For now, show success message.
                // echo "User registered successfully!";
                $this->adminAuthRepository->adminStore($name, $email, $bcrypt_password);
                header("Location: index.php?route=admin/login");
                return;
            }
        }
        $this->render('pages/register', [
            'errors' => $errors,
        ]);
    }
    // admin login function
    public function adminLogin()
    {
        $check_login = $this->adminAuthRepository->isLoggedIn();
        if ($check_login) {
            header("Location: index.php?route=admin/dashboard");
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
                $isEmailExists = $this->adminAuthRepository->isEmailExists($email);
                // var_dump($isEmailExists);
                // die();
                if (!$isEmailExists) {
                    $errors[] = "User not registered with us!";
                }
            }
            $is_login = $this->adminAuthRepository->loginHandler($email, $password);
            if (empty($errors)) {
                if ($is_login) {
                    header("Location: index.php?route=admin/dashboard");
                    return;
                } else {
                    $errors[] = "Wrong credentials!";
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
        $this->adminAuthRepository->logout();
        header("Location: index.php?route=admin/login");
    }
}
