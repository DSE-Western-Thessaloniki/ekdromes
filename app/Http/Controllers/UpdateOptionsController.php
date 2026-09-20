<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateOptionRequest;
use App\Models\Option;
use Illuminate\Http\Request;

class UpdateOptionsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateOptionRequest $request)
    {
        $validated = $request->validated();

        foreach ($validated as $key => $value) {
            Option::updateOrCreate(
                ['name' => $key],
                ['value' => $value]
            );
        }

        return to_route('admin.index')
            ->with('success', 'Οι ρυθμίσεις αποθηκεύτηκαν.');
    }
}
