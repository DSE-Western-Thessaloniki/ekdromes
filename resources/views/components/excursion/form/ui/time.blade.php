@props(['fieldName', 'label', 'required' => false, 'value' => null])

<div {{ $attributes }}>
    <label for="{{ $fieldName }}"
        class="block text-sm font-medium text-gray-700 mb-1">{{ $label }}{{ $required ? ' *' : '' }}</label>
    <input type="time" name="{{ $fieldName }}" id="{{ $fieldName }}"
        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-coral focus:border-transparent"
        {{ $required ? 'required' : '' }} value="{{ old($fieldName, $value) }}">
</div>
