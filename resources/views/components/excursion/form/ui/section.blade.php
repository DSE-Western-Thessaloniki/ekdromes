@props(['title'])

<section class="mb-6 rounded-xl border border-gray-200 bg-white p-5 shadow-sm sm:p-6">
    <h4 class="border-b border-gray-100 pb-3 text-lg font-semibold text-brand">{{ $title ?? '' }}</h4>
    <div class="grid grid-cols-1 gap-x-6 gap-y-5 pt-4 md:grid-cols-2">
        {{ $slot }}
    </div>
</section>
