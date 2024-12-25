<?php

namespace App\Admin\Repository\AdminAuthRepository;

use PDO;

class AdminAuthRepository
{
    public function __construct(private PDO $pdo)
    {}

    // htmlspecialchars
    public function entChar($value)
    {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }

    // make strict password
    public function strictPassword(string $isPassword, string $cPassword)
    {
        $passwordError = [];

        // Ensure the inputs are strings and sanitize them
        $password = is_string($isPassword) ? $this->entChar($isPassword) : '';
        $confirmPassword = is_string($cPassword) ? $this->entChar($cPassword) : '';

        // Check if inputs are empty after sanitization
        if (empty($password) || empty($confirmPassword)) {
            $passwordError[] = "Password and Confirm Password fields cannot be empty.";
            return $passwordError;
        }

        // Password pattern: At least 1 uppercase, 1 lowercase, 1 number, 1 special character, minimum length 8
        $password_pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';

        // Check if passwords match
        if ($password !== $confirmPassword) {
            $passwordError[] = "Passwords do not match.";
        }

        // Check password strength
        if (!preg_match($password_pattern, $password)) {
            $passwordError[] = "Password must be at least 8 characters long and contain at least 1 uppercase letter, 1 lowercase letter, 1 number, and 1 special character.";
        }

        // var_dump($passwordError);
        // Return errors if any
        if (!empty($passwordError)) {
            return ["message" => $passwordError];
        }

        // If everything is fine, return true
        return ["message" => "success"];
    }

    // ensure session
    private function ensureSession()
    {
        if (session_id() === '') {
            session_start();
        }
    }

    // check user is login or not for if user is logged in he does not redirect to register and login page
    public function isLoggedIn(): bool
    {
        $this->ensureSession();
        return !empty($_SESSION['is_admin']);
    }

    // email already exists or not
    public function isEmailExists(string $email)
    {
        $query = "SELECT COUNT(`email`) AS `count` FROM `admins` WHERE `email`=:email";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(":email", $email);
        $stmt->execute();
        $rows = $stmt->fetch(PDO::FETCH_ASSOC);
        return $rows['count'] >= 1;
    }

    // password bycrpt
    public function passwordBcrypt(string $password)
    {
        $by_crpt_password = password_hash($password, PASSWORD_DEFAULT);
        return $by_crpt_password;
    }

    // user store in db
    public function adminStore(string $name, string $email, string $password)
    {
        $query = "INSERT INTO `admins` (`name`,`email`,`password`) VALUES (:name,:email,:password)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(":name", $name, PDO::PARAM_STR);
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $stmt->bindValue(":password", $password, PDO::PARAM_STR);
        $stmt->execute();
    }

    // login handler function
    public function loginHandler(string $email, string $password)
    {
        $query = "SELECT * FROM `admins` WHERE `email`=:email";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $entry = $stmt->fetch(PDO::FETCH_ASSOC);
        // var_dump($entry);
        // die();

        if (empty($entry)) {
            return false;
        }
        $hash_password = $entry['password'];

        $password_okay = password_verify($password, $hash_password);
        if (empty($password_okay)) {
            // $byCrptPassword = $this->passwordBcrypt($password);
            // var_dump($hash_password, $password, $byCrptPassword);
            // die();
            return false;
        }

        $this->ensureSession();
        $_SESSION['is_admin'] = $entry['id'];
        session_regenerate_id();

        return true;
    }

    // logout handler
    public function logout()
    {
        $this->ensureSession();
        unset($_SESSION['is_admin']);
        session_regenerate_id();
    }
}
