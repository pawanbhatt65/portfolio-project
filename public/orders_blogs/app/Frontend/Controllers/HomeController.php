<?php

namespace App\Frontend\Controllers;

use App\Frontend\Repository\Auth\AuthRepository;
use App\Frontend\Repository\HomeRepository;

class HomeController extends AbstractController
{
    public function __construct(private HomeRepository $homeRepository, AuthRepository $authRepository)
    {
        parent::__construct($authRepository);
    }
    // homepage
    public function home($search = '')
    {
        $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int) $_GET['page'] : 1;
        // var_dump($page);
        // var_dump($search);
        // die();
        $limit = 10;
        $offset = ($page - 1) * $limit;
        $blogs = $this->homeRepository->showAllBlogs($limit, $offset, $search);
        $total_counts = $this->homeRepository->getCountBlogs($search);
        // var_dump($total_counts);
        $total_page = ceil($total_counts / $limit);
        // var_dump($total_page);

        return $this->render('pages/home', [
            'blogs' => $blogs,
            'totalPages' => $total_page,
            'currentPage' => $page,
            'limit' => $limit,
            'search' => $search,
        ]);
    }
    // public function home()
    // {
    //     $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int) $_GET['page'] : 1;
    //     $limit = 10;
    //     $offset = ($page - 1) * $limit;
    //     $blogs = $this->homeRepository->showAllBlogs($limit, $offset);
    //     $total_counts = $this->homeRepository->getCountBlogs();
    //     // var_dump($total_counts);
    //     $total_page = ceil($total_counts / $limit);
    //     // var_dump($total_page);

    //     return $this->render('pages/home', [
    //         'blogs' => $blogs,
    //         'totalPages' => $total_page,
    //         'currentPage' => $page,
    //         'limit' => $limit,
    //     ]);
    // }
    // blog search from title and description

}
