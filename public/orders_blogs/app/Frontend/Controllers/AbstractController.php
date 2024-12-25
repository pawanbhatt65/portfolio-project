<?php

namespace App\Frontend\Controllers;

use App\Frontend\Repository\Auth\AuthRepository;

abstract class AbstractController
{
    public function __construct(protected AuthRepository $authRepository)
    {}

    protected function render($views, $params)
    {
        extract($params);
        ob_start();

        require __DIR__ . '/../../../views/frontend/' . $views . '.view.php';
        $contents = ob_get_clean();

        $is_logged_in = $this->authRepository->isLoggedIn();

        require __DIR__ . '/../../../views/frontend/layouts/main.view.php';
    }

}
