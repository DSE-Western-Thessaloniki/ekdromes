@props(['fieldName', 'label', 'required' => false, 'value' => null, 'default', 'max' => null])

@php
    $maxDate = $max ?? null;
    $hasError = isset($errors) && $errors->has($fieldName);
@endphp
<div {{ $attributes }}>
    <label for="{{ $fieldName }}" class="mb-1.5 block text-sm font-medium text-gray-700">
        {{ $label }}{{ $required ? ' *' : '' }}
    </label>
    <input type="date" name="{{ $fieldName }}" id="{{ $fieldName }}"
        @if ($maxDate === 'today') max="{{ date('Y-m-d') }}" @else max="{{ $maxDate }}" @endif
        @if ($hasError) aria-invalid="true" aria-describedby="{{ $fieldName }}-error" @endif
        class="w-full rounded-md border bg-white px-3 py-2.5 text-sm text-gray-900 shadow-sm transition focus:outline-none focus:ring-2 {{ $hasError ? 'border-red-400 focus:border-red-500 focus:ring-red-500/20' : 'border-gray-300 focus:border-brand focus:ring-brand/20' }}"
        {{ $required ? 'required' : '' }} value="{{ old($fieldName, $value) }}">
    @if ($hasError)
        <p id="{{ $fieldName }}-error" class="mt-1.5 text-sm text-red-700" role="alert">{{ $errors->first($fieldName) }}</p>
    @endif
</div>
