<?php

namespace App\Http\Controller\Api;

use Illuminate\Http\Request;

class RequestController extends ApiController
{
    /**
     * @var RequestService
     */
    private $requestService;

    public function __construct() {

    }
}
