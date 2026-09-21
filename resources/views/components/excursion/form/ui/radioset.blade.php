@props(['fieldName', 'legend', 'options', 'value'])

@php
    if (!isset($options)) {
        $options = [];
    }
@endphp

<fieldset {{ $attributes }}>
    <legend class="text-sm">{{ $legend }}</legend>
    @foreach ($options as $option)
        <div>
            <input type="radio" id="{{ $option['id'] }}" name="{{ $fieldName }}" value="{{ $option['value'] }}"
                @checked($value === $option['value']) />
            <label for="{{ $option['id'] }}">{{ $option['value'] }}</label>
        </div>
    @endforeach
</fieldset>
