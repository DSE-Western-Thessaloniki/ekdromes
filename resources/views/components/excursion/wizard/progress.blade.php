@props(['percent'])

@php
    $progress = max(0, min(100, (int) $percent));
    $busPosition = max(3, min(97, $progress));
@endphp

<section {{ $attributes->merge(['class' => 'my-6 rounded-xl border border-gray-200 bg-white p-4 shadow-sm sm:p-5']) }}
    aria-label="Πρόοδος οδηγού εκδρομών">
    <div class="mb-3 flex items-center justify-between gap-3">
        <h2 class="text-sm font-semibold text-gray-800 sm:text-base">Πρόοδος επιλογής</h2>
        <span class="text-sm font-semibold tabular-nums text-brand">{{ $progress }}% ολοκληρώθηκε</span>
    </div>
    <div class="relative pt-4">
        <span class="absolute top-0 -translate-x-1/2 text-brand" style="left: {{ $busPosition }}%" aria-hidden="true">
            <i class="fas fa-bus text-sm"></i>
        </span>
        <div class="h-2.5 overflow-hidden rounded-full bg-gray-200" role="progressbar"
            aria-label="Ολοκλήρωση επιλογής τύπου εκδρομής" aria-valuemin="0" aria-valuemax="100"
            aria-valuenow="{{ $progress }}" aria-valuetext="{{ $progress }}% ολοκληρώθηκε">
            <div class="h-full rounded-full bg-brand transition-[width] duration-300" style="width: {{ $progress }}%">
            </div>
        </div>
    </div>
</section>
