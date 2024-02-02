<?php

namespace App\Repositories;

use App\Repositories\Eloquent\Repository;

class RequestRepository extends Repository
{
    public function model()
    {
        return 'App\Models\RequestModel';
    }
}