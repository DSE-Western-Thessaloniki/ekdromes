<?php

declare(strict_types=1);

namespace App\Traits;

use Illuminate\Http\Request;

trait DataTablesSSP
{
    protected array $params;

    protected array $returnedData;

    public function __construct(Request $request)
    {
        // Δες τις τιμές που μας ζήτησε το DataTable
        $this->params = [
            'draw' => $request->input('draw'),
            'start' => $request->input('start'),
            'length' => $request->input('length'),
            'search' => $request->input('search'),
            'order' => $request->input('order'),
            'columns' => $request->input('columns'),
        ];
    }

    /**
     * @return array<string, array<int, string>>
     */
    public static function rules(): array
    {
        return [
            'draw' => ['required', 'integer'],
            'start' => ['required', 'integer'],
            'length' => ['required', 'integer'],
            'columns' => ['required', 'array'],
            'order' => ['sometimes', 'array'],
        ];
    }

    public function getReturnedData(): array
    {
        return $this->returnedData;
    }
}
