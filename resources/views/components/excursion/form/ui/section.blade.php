@props(['title'])

<div class="border-2 border-gray-300 rounded-lg p-4 mb-6">
    <h4 class="font-semibold text-gray-700 mb-4">{{ $title ?? '' }}</h4>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        {{ $slot }}
    </div>
</div>
