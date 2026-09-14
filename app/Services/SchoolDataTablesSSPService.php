<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\DataTablesSSPInterface;
use App\Traits\DataTablesSSP;
use Illuminate\Database\Eloquent\Builder;

final class SchoolDataTablesSSPService implements DataTablesSSPInterface
{
    use DataTablesSSP;

    protected array $searchOptions;

    public function setSearchOptions(array $searchOptions): void
    {
        $this->searchOptions = $searchOptions;
    }

    public function setSchoolId(int $schoolId): void
    {
        $this->params['school_id'] = $schoolId;
    }

    private function createQuery(): Builder
    {
        $schoolId = $this->params['school_id'] ?? null;

        return new ExcursionService()->getExcursionsQuery($schoolId);
    }

    public function handle(): void
    {
        $query = $this->createQuery();

        $recordsTotal = $query->count();

        // Global search
        $searchValue = $this->params['search']['value'] ?? '';
        if ($searchValue !== '') {
            $query->where(function (Builder $q) use ($searchValue): void {
                $q->where('eidos_ekdromis', 'like', "%{$searchValue}%")
                    ->orWhere('proorismos', 'like', "%{$searchValue}%")
                    ->orWhere('status', 'like', "%{$searchValue}%")
                    ->orWhere('ar_prot', 'like', "%{$searchValue}%");
            });
        }

        // Per-column search
        foreach ($this->params['columns'] ?? [] as $column) {
            $searchVal = $column['search']['value'] ?? '';
            if ($searchVal === '') {
                continue;
            }

            $data = $column['data'];
            match ($data) {
                'eidos_ekdromis' => $query->where('eidos_ekdromis', 'like', "%{$searchVal}%"),
                'proorismos' => $query->where('proorismos', 'like', "%{$searchVal}%"),
                'status' => $query->where('status', 'like', "%{$searchVal}%"),
                default => null,
            };
        }

        $recordsFiltered = $query->count();

        // Ordering
        foreach ($this->params['order'] ?? [] as $order) {
            $columnName = $this->params['columns'][$order['column']]['data'] ?? null;
            $direction = $order['dir'] ?? 'asc';

            match ($columnName) {
                'index' => $query->orderBy('id', $direction),
                default => $query->orderBy($columnName, $direction),
            };
        }

        $results = $query
            ->offset($this->params['start'])
            ->take($this->params['length'])
            ->get()
            ->map(fn ($record, $index): array => [
                'index' => $index + $this->params['start'] + 1,
                'id' => $record->id,
                'eidos_ekdromis' => $record->eidos_ekdromis,
                'proorismos' => $record->proorismos ?? '-',
                'hmera_ekdromis_anaxorisis' => $record->hmera_ekdromis_anaxorisis?->format('d/m/Y'),
                'hmera_epistrofis' => $record->hmera_epistrofis?->format('d/m/Y'),
                'ar_mathiton' => $record->ar_mathiton ?? '-',
                'status' => $record->status,
                'ar_prot' => $record->ar_prot,
                'isDraft' => $record->isDraft(),
            ]);

        $this->returnedData = [
            'draw' => (int) $this->params['draw'],
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $results->toArray(),
        ];
    }
}
