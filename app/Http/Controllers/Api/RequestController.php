<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\RequestService;
use App\Constants\AppRequest;
use App\Traits\ApiResponse;
use App\Http\Resources\RequestResource;

class RequestController extends ApiController
{
    use ApiResponse;
    /**
     * @var RequestService
     */
    private $requestService;

    public function __construct(RequestService $requestService) {
        $this->requestService = $requestService;
        parent::__construct();
    }

    public function index(Request $request)
    {
        try {
            $user = $request->user();
            $params = [
                'limit' => $request->query('pageSize', AppRequest::LIMIT) ?? AppRequest::LIMIT,
                'offset' => $request->query('pageIndex', 1) ?? 1,
            ];
            [$total, $requests] = $this->requestService->all($params);

            return $this->sendSuccess(
                [
                    'total' => $total,
                    'requests' => RequestResource::collection($requests)
                ]
            );
        } catch (\Exception $e) {
            return $this->sendError($e);
        }
    }
}
