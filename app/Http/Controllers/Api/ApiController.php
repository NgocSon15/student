<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('jwt.auth');
    }
}