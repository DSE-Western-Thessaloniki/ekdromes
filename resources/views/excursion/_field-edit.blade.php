@props(['fieldName', 'fieldDef', 'excursion'])

@if ($fieldDef['type'] === 'select')
    <label for="{{ $fieldName }}" class="block text-sm font-medium text-gray-700 mb-1">{{ $fieldDef['label'] }}</label>
    <select name="{{ $fieldName }}" id="{{ $fieldName }}"
        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-coral focus:border-transparent">
        @if ($fieldDef['emptyItem'] ?? true)
            <option value="">-- Επιλέξτε --</option>
        @endif
        @foreach ($fieldDef['options'] as $opt)
            <option value="{{ $opt }}"
                {{ old($fieldName, $excursion->{$fieldName} ?? '') === $opt ? 'selected' : '' }}>
                {{ $opt }}</option>
        @endforeach
    </select>
@elseif($fieldDef['type'] === 'textarea')
    <label for="{{ $fieldName }}" class="block text-sm font-medium text-gray-700 mb-1">{{ $fieldDef['label'] }}</label>
    <div
        class="flex border border-gray-300 rounded focus-within:ring-2 focus-within:ring-coral focus-within:border-transparent">
        <div id="{{ $fieldName }}-line-numbers"
            class="flex flex-col items-end py-2 pr-2 pl-3 text-xs text-gray-400 select-none bg-gray-50 rounded-l border-r border-gray-300 leading-[1.5rem]"
            aria-hidden="true"></div>
        <textarea name="{{ $fieldName }}" id="{{ $fieldName }}" rows="4"
            class="w-full border-0 rounded-r px-3 py-2 focus:outline-none focus:ring-0 focus:border-transparent resize-none leading-[1.5rem]"
            placeholder="{{ $fieldDef['placeholder'] ?? '' }}">{{ old($fieldName, $excursion->{$fieldName} ?? '') }}</textarea>
    </div>
    <script>
        (function() {
            const textarea = document.getElementById('{{ $fieldName }}');
            const lineNumbers = document.getElementById('{{ $fieldName }}-line-numbers');

            function update() {
                const lines = (textarea.value || '').split('\n').length;
                lineNumbers.innerHTML = Array.from({
                    length: lines
                }, (_, i) => '<span>' + (i + 1) + '</span>').join('');
            }
            textarea.addEventListener('input', update);
            update();
        })();
    </script>
    @if (isset($fieldDef['help']))
        <p class="text-xs text-gray-500 mt-1">{{ $fieldDef['help'] }}</p>
    @endif
@elseif($fieldDef['type'] === 'date')
    <label for="{{ $fieldName }}"
        class="block text-sm font-medium text-gray-700 mb-1">{{ $fieldDef['label'] }}</label>
    <input type="date" name="{{ $fieldName }}" id="{{ $fieldName }}"
        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-coral focus:border-transparent"
        @if ($fieldDef['max'] ?? null) @if ($fieldDef['max'] === 'today') max="{{ date('Y-m-d') }}" @else max="{{ $fieldDef['max'] }}" @endif
        @endif
    value="{{ old($fieldName, $excursion->{$fieldName}?->format('Y-m-d') ?? '') }}">
@elseif($fieldDef['type'] === 'time')
    <label for="{{ $fieldName }}"
        class="block text-sm font-medium text-gray-700 mb-1">{{ $fieldDef['label'] }}</label>
    <input type="time" name="{{ $fieldName }}" id="{{ $fieldName }}"
        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-coral focus:border-transparent"
        value="{{ old($fieldName, $excursion->{$fieldName} ?? '') }}">
@else
    <label for="{{ $fieldName }}"
        class="block text-sm font-medium text-gray-700 mb-1">{{ $fieldDef['label'] }}</label>
    <input type="{{ $fieldDef['type'] }}" name="{{ $fieldName }}" id="{{ $fieldName }}"
        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-coral focus:border-transparent"
        placeholder="{{ $fieldDef['placeholder'] ?? '' }}"
        value="{{ old($fieldName, $excursion->{$fieldName} ?? '') }}"
        @if (isset($fieldDef['min'])) min="{{ $fieldDef['min'] }}" @endif>
@endif
