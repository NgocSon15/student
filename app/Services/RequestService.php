<?php

namespace App\Services;

use App\Constants\AppRequest;
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
        $type = $params['type'];
        $status = $params['status'];

        $query = RequestModel::query();

        if ($type) {
            $query->where('type', $type);
        }

        if ($status) {
            $query->where('status', $status);
        }
        
        $total = $query->count();

        $requests = $query->orderBy('id', 'DESC')->skip(($offset - 1) * $limit)->take($limit)->get();

        return [$total, $requests];
    }

    public function createRequest($user, $type)
    {
        return $this->store([
            'user_id' => $user->id,
            'code' => '12345',
            'type' => $type,
            'status' => AppRequest::STATUS_IN_PROGESS,
            'processing_place' => 1,
            'expire_in' => AppRequest::DEFAULT_EXPIRE_DAY,
            // 'receive_date' => now()
        ]);
    }
}