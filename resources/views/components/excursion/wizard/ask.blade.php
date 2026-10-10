@props(['question', 'prevstep', 'replyA', 'stepA', 'replyB', 'stepB'])

<div class="mx-auto w-full max-w-3xl space-y-5">
    <section class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm" aria-labelledby="wizard-question">
        <div class="border-b border-gray-100 bg-gray-50 px-5 py-4 sm:px-6">
            <p class="mb-1 text-xs font-semibold uppercase tracking-wide text-brand">Ερώτηση</p>
            <h2 id="wizard-question" class="text-lg font-semibold leading-7 text-gray-900">{{ $question }}</h2>
        </div>
        <nav class="p-4 sm:p-6" aria-label="Επιλέξτε απάντηση">
            <ul class="grid gap-3">
                <li>
                    <a href="{{ route('excursion.wizard', ['step' => $stepA]) }}"
                        class="group flex min-h-14 items-center justify-between gap-4 rounded-lg border border-gray-200 bg-white px-4 py-3 text-sm font-medium text-gray-800 transition hover:border-brand hover:bg-blue-50 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand sm:text-base">
                        <span>{{ $replyA }}</span>
                        <i class="fas fa-arrow-right shrink-0 text-brand transition-transform group-hover:translate-x-1"
                            aria-hidden="true"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ route('excursion.wizard', ['step' => $stepB]) }}"
                        class="group flex min-h-14 items-center justify-between gap-4 rounded-lg border border-gray-200 bg-white px-4 py-3 text-sm font-medium text-gray-800 transition hover:border-brand hover:bg-blue-50 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand sm:text-base">
                        <span>{{ $replyB }}</span>
                        <i class="fas fa-arrow-right shrink-0 text-brand transition-transform group-hover:translate-x-1"
                            aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
        </nav>
    </section>
    @unless ($prevstep === '0')
        <a href="{{ route('excursion.wizard', ['step' => $prevstep]) }}"
            class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 transition hover:border-brand hover:text-brand focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand">
            <i class="fas fa-arrow-left" aria-hidden="true"></i>
            Προηγούμενο βήμα
        </a>
    @endunless
</div>
