@props(['fieldName', 'fieldDef', 'required' => false])

@if ($fieldDef['type'] === 'select')
    <label for="{{ $fieldName }}"
        class="block text-sm font-medium text-gray-700 mb-1">{{ $fieldDef['label'] }}{{ $required ? ' *' : '' }}</label>
    <select name="{{ $fieldName }}" id="{{ $fieldName }}"
        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-coral focus:border-transparent"
        {{ $required ? 'required' : '' }}>
        @if ($fieldDef['emptyItem'] ?? true)
            <option value="">-- Επιλέξτε --</option>
        @endif
        @foreach ($fieldDef['options'] as $opt)
            <option value="{{ $opt }}" @selected(($fieldDef['default'] ?? null) === $opt)>{{ $opt }}</option>
        @endforeach
    </select>
@elseif($fieldDef['type'] === 'textarea')
    <label for="{{ $fieldName }}"
        class="block text-sm font-medium text-gray-700 mb-1">{{ $fieldDef['label'] }}{{ $required ? ' *' : '' }}</label>
    <textarea name="{{ $fieldName }}" id="{{ $fieldName }}" rows="3"
        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-coral focus:border-transparent"
        placeholder="{{ $fieldDef['placeholder'] ?? '' }}" {{ $required ? 'required' : '' }}></textarea>
    @if (isset($fieldDef['help']))
        <p class="text-xs text-gray-500 mt-1">{{ $fieldDef['help'] }}</p>
    @endif
@elseif($fieldDef['type'] === 'date')
    <label for="{{ $fieldName }}"
        class="block text-sm font-medium text-gray-700 mb-1">{{ $fieldDef['label'] }}{{ $required ? ' *' : '' }}</label>
    <input type="date" name="{{ $fieldName }}" id="{{ $fieldName }}"
        @if (($fieldDef['default'] ?? null) === 'today') value="{{ date('Y-m-d') }}" @endif
        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-coral focus:border-transparent"
        {{ $required ? 'required' : '' }}>
@elseif($fieldDef['type'] === 'time')
    <label for="{{ $fieldName }}"
        class="block text-sm font-medium text-gray-700 mb-1">{{ $fieldDef['label'] }}{{ $required ? ' *' : '' }}</label>
    <input type="time" name="{{ $fieldName }}" id="{{ $fieldName }}"
        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-coral focus:border-transparent"
        {{ $required ? 'required' : '' }}>
@else
    <label for="{{ $fieldName }}"
        class="block text-sm font-medium text-gray-700 mb-1">{{ $fieldDef['label'] }}{{ $required ? ' *' : '' }}</label>
    <input type="{{ $fieldDef['type'] }}" name="{{ $fieldName }}" id="{{ $fieldName }}"
        @if (isset($fieldDef['min'])) min="{{ $fieldDef['min'] }}" @endif
        @if (isset($fieldDef['max'])) max="{{ $fieldDef['max'] }}" @endif
        @if (isset($fieldDef['value'])) value="{{ $fieldDef['value'] }}" @endif
        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-coral focus:border-transparent"
        placeholder="{{ $fieldDef['placeholder'] ?? '' }}"
        @if (isset($fieldDef['min'])) min="{{ $fieldDef['min'] }}" @endif {{ $required ? 'required' : '' }}>
@endif
