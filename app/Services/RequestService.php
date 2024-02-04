<?php

namespace App\Services;

use App\Models\RequestModel;

class RequestService
{
    public function store($params = [])
    {
        $item = RequestModel::create($params);
        return $item;
    }

    public function all($params)
    {
        $limit = $params['limit'];
        $offset = $params['offset'];
        
        $total = RequestModel::count();

        $requests = RequestModel::skip($offset)->take($limit)->get();

        return [$total, $requests];
    }
}