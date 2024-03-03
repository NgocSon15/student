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

        $query = RequestModel::query();

        if ($type) {
            $query->where('type', $type);
        }
        
        $total = $query->count();

        $requests = $query->skip(($offset - 1) * $limit)->take($limit)->get();

        return [$total, $requests];
    }

    public function createRequest($user, $type)
    {
        return $this->store([
            'user_id' => $user->id,
            'code' => '12345',
            'type' => $type,
            'status' => AppRequest::STATUS_IN_PROGESS,
            'fee' => AppRequest::REQUEST_FEES[$type],
            'processing_place' => 'Phòng Công tác Sinh viên',
            // 'receive_date' => now()
        ]);
    }
}