<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\SearchDataTablesSSPService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ExcursionSearchController extends Controller
{
    public function __invoke(Request $request, SearchDataTablesSSPService $searchService): JsonResponse
    {
        if (Session::get('cas_model_category') !== 'user') {
            abort(403, 'Δεν έχετε δικαίωμα πρόσβασης');
        }

        $searchService->setSearchOptions([]);
        $searchService->handle();

        return response()->json($searchService->getReturnedData());
    }
}
