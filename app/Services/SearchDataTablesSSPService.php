<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\DataTablesSSPInterface;
use App\Traits\DataTablesSSP;
use Illuminate\Database\Eloquent\Builder;

final class SearchDataTablesSSPService implements DataTablesSSPInterface
{
    use DataTablesSSP;

    protected array $searchOptions;

    public function setSearchOptions(array $searchOptions): void
    {
        $this->searchOptions = $searchOptions;
    }

    private function createQuery(): Builder
    {
        return (new ExcursionService)->getExcursionsQuery();
    }

    public function handle(): void
    {
        $query = $this->createQuery();

        $recordsTotal = $query->count();

        // Global search
        $searchValue = $this->params['search']['value'] ?? '';
        if ($searchValue !== '') {
            $query->where(function (Builder $q) use ($searchValue): void {
                $q->where('ar_prot_sxoleiou', 'like', "%{$searchValue}%")
                    ->orWhere('eidos_ekdromis', 'like', "%{$searchValue}%")
                    ->orWhere('status', 'like', "%{$searchValue}%")
                    ->orWhereHas('school', function (Builder $sq) use ($searchValue): void {
                        $sq->where('displayname', 'like', "%{$searchValue}%");
                    });
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
                'school.displayname' => $query->whereHas('school', function (Builder $sq) use ($searchVal): void {
                    $sq->where('displayname', 'like', "%{$searchVal}%");
                }),
                'ar_prot_sxoleiou' => $query->where('ar_prot_sxoleiou', 'like', "%{$searchVal}%"),
                'eidos_ekdromis' => $query->where('eidos_ekdromis', 'like', "%{$searchVal}%"),
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
                'school.displayname' => $query->orderByHas('school', 'displayname', $direction),
                default => $query->orderBy($columnName, $direction),
            };
        }

        $results = $query
            ->offset($this->params['start'])
            ->take($this->params['length'])
            ->get()
            ->map(fn ($record, $index): array => [
                'index' => $index + $this->params['start'] + 1,
                'school' => ['displayname' => $record->school->displayname, 'id' => $record->school->id],
                'ar_prot_sxoleiou' => $record->ar_prot_sxoleiou ?? '-',
                'eidos_ekdromis' => $record->eidos_ekdromis,
                'status' => $record->status,
                'ar_prot' => $record->ar_prot,
                'submit_datetime' => $record->submit_datetime?->format('d-m-Y H:i'),
                'id' => $record->id,
            ]);

        $this->returnedData = [
            'draw' => (int) $this->params['draw'],
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $results->toArray(),
        ];
    }
}
