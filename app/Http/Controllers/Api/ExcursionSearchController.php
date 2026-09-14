<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\SearchDataTablesSSPService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ExcursionSearchController extends Controller
{
    public function __invoke(Request $request, SearchDataTablesSSPService $searchService): JsonResponse
    {
        $searchService->setSearchOptions([]);
        $searchService->handle();

        return response()->json($searchService->getReturnedData());
    }
}
