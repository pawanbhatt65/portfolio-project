<?php

namespace App\Frontend\Controllers;

class NotFoundController extends AbstractController
{
    public function error404()
    {
        http_response_code(404);
        $this->render('errors/error404', []);
    }
}
