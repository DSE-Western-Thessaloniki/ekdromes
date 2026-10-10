@props(['fieldName', 'legend', 'options', 'value'])

@php
    if (!isset($options)) {
        $options = [];
    }
@endphp

<fieldset {{ $attributes }}>
    <legend class="mb-2 text-sm font-medium text-gray-700">{{ $legend }}</legend>
    @foreach ($options as $option)
        <div class="flex items-start gap-2 py-0.5">
            <input type="radio" id="{{ $option['id'] }}" name="{{ $fieldName }}" value="{{ $option['value'] }}"
                class="mt-0.5 border-gray-300 text-brand focus:ring-2 focus:ring-brand/20"
                @checked($value === $option['value']) />
            <label for="{{ $option['id'] }}" class="text-sm leading-5 text-gray-700">{{ $option['value'] }}</label>
        </div>
    @endforeach
    @if (isset($errors) && $errors->has($fieldName))
        <p id="{{ $fieldName }}-error" class="mt-1.5 text-sm text-red-700" role="alert">{{ $errors->first($fieldName) }}</p>
    @endif
</fieldset>
