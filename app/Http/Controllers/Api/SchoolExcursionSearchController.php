<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\SchoolDataTablesSSPService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SchoolExcursionSearchController extends Controller
{
    public function __invoke(Request $request, SchoolDataTablesSSPService $searchService): JsonResponse
    {
        $school = Session::get('school');

        if (! $school) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $searchService->setSchoolId($school->id);
        $searchService->setSearchOptions([]);
        $searchService->handle();

        return response()->json($searchService->getReturnedData());
    }
}
