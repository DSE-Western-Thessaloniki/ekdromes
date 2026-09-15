@props([
    'fieldName',
    'label' => '',
    'emptyItem' => true,
    'default' => null,
    'required' => false,
    'value' => null,
    'options' => [],
])

@php
    if ($value === null) {
        $selectedValue = $default;
    } else {
        $selectedValue = $value;
    }
@endphp

<div {{ $attributes }}>
    <label for="{{ $fieldName }}"
        class="block text-sm font-medium text-gray-700 mb-1">{{ $label }}{{ $required ? ' *' : '' }}</label>
    <select name="{{ $fieldName }}" id="{{ $fieldName }}"
        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-coral focus:border-transparent"
        {{ $required ? 'required' : '' }}>
        @if ($emptyItem ?? true)
            <option value="">-- Επιλέξτε --</option>
        @endif
        @foreach ($options as $opt)
            <option value="{{ $opt }}" @selected($selectedValue === $opt)>{{ $opt }}</option>
        @endforeach
    </select>
</div>
