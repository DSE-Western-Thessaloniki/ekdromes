@props(['percent'])

@php
    $imageplacement = $percent;
    if ($imageplacement > 80) {
        $imageplacement = 80;
    } //force max limit
@endphp

<div {{ $attributes->merge(['class' => 'pb-4']) }}>
    <p class="w-full">
        <img src='{{ Vite::asset('resources/images/bus-big-compressed.gif') }}' class="h-22"
            style='position:relative;left:{{ $imageplacement }}%;' alt='bus' />
    </p>
    <div class='progress bg-gray-300 rounded-sm h-6 w-full relative flex'>
        <div class='bg-cyan-500 rounded-sm text-center' value='{{ $percent }}' max='100' aria-valuemin='0'
            aria-valuemax='100' role="progressbar" ariavaluenow='{{ $percent }}'
            style='width:{{ $percent }}%'>
            <div class="text-white">
                {{ $percent }}%
            </div>
        </div>
    </div>
</div>
