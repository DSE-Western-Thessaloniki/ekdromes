@props(['fieldName', 'fieldDef', 'excursion'])

@if ($fieldDef['type'] === 'select')
    <label for="{{ $fieldName }}" class="block text-sm font-medium text-gray-700 mb-1">{{ $fieldDef['label'] }}</label>
    <select name="{{ $fieldName }}" id="{{ $fieldName }}"
        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-coral focus:border-transparent">
        @if ($fieldDef['emptyItem'] ?? true)
            <option value="">-- Επιλέξτε --</option>
        @endif
        @foreach ($fieldDef['options'] as $opt)
            <option value="{{ $opt }}" {{ ($excursion->{$fieldName} ?? '') === $opt ? 'selected' : '' }}>
                {{ $opt }}</option>
        @endforeach
    </select>
@elseif($fieldDef['type'] === 'textarea')
    <label for="{{ $fieldName }}" class="block text-sm font-medium text-gray-700 mb-1">{{ $fieldDef['label'] }}</label>
    <textarea name="{{ $fieldName }}" id="{{ $fieldName }}" rows="4"
        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-coral focus:border-transparent"
        placeholder="{{ $fieldDef['placeholder'] ?? '' }}">{{ $excursion->{$fieldName} ?? '' }}</textarea>
    @if (isset($fieldDef['help']))
        <p class="text-xs text-gray-500 mt-1">{{ $fieldDef['help'] }}</p>
    @endif
@elseif($fieldDef['type'] === 'date')
    <label for="{{ $fieldName }}"
        class="block text-sm font-medium text-gray-700 mb-1">{{ $fieldDef['label'] }}</label>
    <input type="date" name="{{ $fieldName }}" id="{{ $fieldName }}"
        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-coral focus:border-transparent"
        value="{{ $excursion->{$fieldName}?->format('Y-m-d') ?? '' }}">
@elseif($fieldDef['type'] === 'time')
    <label for="{{ $fieldName }}"
        class="block text-sm font-medium text-gray-700 mb-1">{{ $fieldDef['label'] }}</label>
    <input type="time" name="{{ $fieldName }}" id="{{ $fieldName }}"
        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-coral focus:border-transparent"
        value="{{ $excursion->{$fieldName} ?? '' }}">
@else
    <label for="{{ $fieldName }}"
        class="block text-sm font-medium text-gray-700 mb-1">{{ $fieldDef['label'] }}</label>
    <input type="{{ $fieldDef['type'] }}" name="{{ $fieldName }}" id="{{ $fieldName }}"
        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-coral focus:border-transparent"
        placeholder="{{ $fieldDef['placeholder'] ?? '' }}" value="{{ $excursion->{$fieldName} ?? '' }}"
        @if (isset($fieldDef['min'])) min="{{ $fieldDef['min'] }}" @endif>
@endif
