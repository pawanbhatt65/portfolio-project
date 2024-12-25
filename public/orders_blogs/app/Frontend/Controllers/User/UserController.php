<?php

namespace App\Frontend\Controllers\User;

use App\Frontend\Controllers\AbstractController;
use App\Frontend\Repository\Auth\AuthRepository;
use App\Frontend\Repository\User\UserRepository;

class UserController extends AbstractController
{
    public function __construct(private UserRepository $userRepository, AuthRepository $authRepository)
    {
        parent::__construct($authRepository);
    }

    public function userDashboard()
    {
        $blogs = $this->userRepository->showAllBlogs();
        // var_dump($blogs);
        $this->render('pages/user/dashboard', [
            'blogs' => $blogs,
        ]);
    }
}
