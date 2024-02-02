<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Constants\AppRequest;

class RequestResource extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id ?? null,
            'code' => $this->code,
            'type' => $this->type ? [
                'id' => $this->type,
                'name' => AppRequest::TYPES[$this->type]
            ] : null,
            'status' => $this->status ? [
                'id' => $this->status,
                'name' => AppRequest::STATUSES[$this->status]
            ] : null,
            'receive_date' => $this->receive_date
        ];
    }
}
