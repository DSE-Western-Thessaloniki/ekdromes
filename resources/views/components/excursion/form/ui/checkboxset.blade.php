@props(['fieldName', 'legend', 'options', 'value'])

@php
    if (!isset($options)) {
        $options = [];
    }

    if (!isset($value)) {
        $value = [];
    }
@endphp

<fieldset {{ $attributes }}>
    <legend class="text-sm">{{ $legend }}</legend>
    @foreach ($options as $option)
        <div>
            <input type="checkbox" id="{{ $option['id'] }}" name="{{ $fieldName }}" value="{{ $option['value'] }}"
                @checked(in_array($option['value'], $value)) />
            <label for="{{ $option['id'] }}">{{ $option['value'] }}</label>
        </div>
    @endforeach
</fieldset>
