<?php

namespace App\Admin\Controllers;

use App\Admin\Repository\AdminAuthRepository\AdminAuthRepository;

class AdminAbstractController
{
    public function __construct(public AdminAuthRepository $adminAuthRepository)
    {

    }
    public function render($views, $params)
    {
        extract($params);
        ob_start();

        require __DIR__ . "/../../../views/adminpanel/" . $views . ".view.php";
        $contents = ob_get_clean();

        $is_logged_in = $this->adminAuthRepository->isLoggedIn();

        require __DIR__ . "/../../../views/adminpanel/layouts/main.view.php";
    }
}
