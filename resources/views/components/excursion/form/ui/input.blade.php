@props([
    'fieldName',
    'type' => 'text',
    'label' => '',
    'placeholder' => '',
    'required' => false,
    'value' => null,
    'min',
    'max',
    'readonly' => false,
])

<div {{ $attributes }}>
    <label for="{{ $fieldName }}"
        class="block text-sm font-medium text-gray-700 mb-1">{{ $label }}{{ $required ? ' *' : '' }}</label>
    <input type="{{ $type }}" name="{{ $fieldName }}" id="{{ $fieldName }}"
        @if (isset($min)) min="{{ $min }}" @endif
        @if (isset($max)) max="{{ $max }}" @endif value="{{ $value }}"
        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-coral focus:border-transparent read-only:bg-gray-200"
        placeholder="{{ $placeholder }}" {{ $required ? 'required' : '' }} {{ $readonly ? 'readonly' : '' }}>
</div>
