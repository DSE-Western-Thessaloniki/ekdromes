@props(['fieldName', 'label', 'required' => false, 'value' => null, 'default', 'max' => null])

@php
    $maxDate = $max ?? null;
@endphp
<div {{ $attributes }}>
    <label for="{{ $fieldName }}"
        class="block text-sm font-medium text-gray-700 mb-1">{{ $label }}{{ $required ? ' *' : '' }}</label>
    <input type="date" name="{{ $fieldName }}" id="{{ $fieldName }}"
        @if ($maxDate === 'today') value="{{ date('Y-m-d') }}" @else max="{{ $maxDate }}" @endif
        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-coral focus:border-transparent"
        {{ $required ? 'required' : '' }} value="{{ $value }}">
</div>
