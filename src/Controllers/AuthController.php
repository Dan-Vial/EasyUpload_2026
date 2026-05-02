<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Request;
use App\Core\View;
use App\Core\Env;

class AuthController
{
    public function index(Request $request): void
    {
        View::render('pages/auth', [

        ]);
    }
}
