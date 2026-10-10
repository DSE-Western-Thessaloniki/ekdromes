@props(['fieldName', 'fieldDef', 'required' => false])

@php($hasError = isset($errors) && $errors->has($fieldName))

@if ($fieldDef['type'] === 'select')
    <label for="{{ $fieldName }}" class="mb-1.5 block text-sm font-medium text-gray-700">
        {{ $fieldDef['label'] }}{{ $required ? ' *' : '' }}
    </label>
    <select name="{{ $fieldName }}" id="{{ $fieldName }}"
        @if ($hasError) aria-invalid="true" aria-describedby="{{ $fieldName }}-error" @endif
        class="w-full rounded-md border bg-white px-3 py-2.5 text-sm text-gray-900 shadow-sm transition focus:outline-none focus:ring-2 {{ $hasError ? 'border-red-400 focus:border-red-500 focus:ring-red-500/20' : 'border-gray-300 focus:border-brand focus:ring-brand/20' }}"
        {{ $required ? 'required' : '' }}>
        @if ($fieldDef['emptyItem'] ?? true)
            <option value="">-- Επιλέξτε --</option>
        @endif
        @foreach ($fieldDef['options'] as $opt)
            <option value="{{ $opt }}" @selected(old($fieldName, $fieldDef['default'] ?? null) === $opt)>{{ $opt }}</option>
        @endforeach
    </select>
@elseif($fieldDef['type'] === 'textarea')
    <label for="{{ $fieldName }}" class="mb-1.5 block text-sm font-medium text-gray-700">
        {{ $fieldDef['label'] }}{{ $required ? ' *' : '' }}
    </label>
    <div
        class="flex rounded-md border bg-white shadow-sm transition focus-within:ring-2 {{ $hasError ? 'border-red-400 focus-within:border-red-500 focus-within:ring-red-500/20' : 'border-gray-300 focus-within:border-brand focus-within:ring-brand/20' }}">
        <div id="{{ $fieldName }}-line-numbers"
            class="flex flex-col items-end py-2 pr-2 pl-3 text-xs text-gray-400 select-none bg-gray-50 rounded-l border-r border-gray-300 leading-[1.5rem]"
            aria-hidden="true"></div>
        <textarea name="{{ $fieldName }}" id="{{ $fieldName }}" rows="3"
            @if ($hasError) aria-invalid="true" aria-describedby="{{ $fieldName }}-error" @endif
            class="w-full resize-none rounded-r border-0 px-3 py-2.5 text-sm leading-[1.5rem] text-gray-900 placeholder:text-gray-400 focus:outline-none focus:ring-0"
            placeholder="{{ $fieldDef['placeholder'] ?? '' }}" {{ $required ? 'required' : '' }}>{{ old($fieldName) }}</textarea>
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
    <label for="{{ $fieldName }}" class="mb-1.5 block text-sm font-medium text-gray-700">
        {{ $fieldDef['label'] }}{{ $required ? ' *' : '' }}
    </label>
    <input type="date" name="{{ $fieldName }}" id="{{ $fieldName }}"
        value="{{ old($fieldName, ($fieldDef['default'] ?? null) === 'today' ? date('Y-m-d') : null) }}"
        @if ($hasError) aria-invalid="true" aria-describedby="{{ $fieldName }}-error" @endif
        class="w-full rounded-md border bg-white px-3 py-2.5 text-sm text-gray-900 shadow-sm transition focus:outline-none focus:ring-2 {{ $hasError ? 'border-red-400 focus:border-red-500 focus:ring-red-500/20' : 'border-gray-300 focus:border-brand focus:ring-brand/20' }}"
        {{ $required ? 'required' : '' }}>
@elseif($fieldDef['type'] === 'time')
    <label for="{{ $fieldName }}"
        class="mb-1.5 block text-sm font-medium text-gray-700">{{ $fieldDef['label'] }}{{ $required ? ' *' : '' }}</label>
    <input type="time" name="{{ $fieldName }}" id="{{ $fieldName }}"
        @if ($hasError) aria-invalid="true" aria-describedby="{{ $fieldName }}-error" @endif
        class="w-full rounded-md border bg-white px-3 py-2.5 text-sm text-gray-900 shadow-sm transition focus:outline-none focus:ring-2 {{ $hasError ? 'border-red-400 focus:border-red-500 focus:ring-red-500/20' : 'border-gray-300 focus:border-brand focus:ring-brand/20' }}"
        value="{{ old($fieldName) }}" {{ $required ? 'required' : '' }}>
@else
    <label for="{{ $fieldName }}" class="mb-1.5 block text-sm font-medium text-gray-700">
        {{ $fieldDef['label'] }}{{ $required ? ' *' : '' }}
    </label>
    <input type="{{ $fieldDef['type'] }}" name="{{ $fieldName }}" id="{{ $fieldName }}"
        @if (isset($fieldDef['min'])) min="{{ $fieldDef['min'] }}" @endif
        @if (isset($fieldDef['max'])) max="{{ $fieldDef['max'] }}" @endif
        value="{{ old($fieldName, $fieldDef['value'] ?? null) }}"
        @if ($hasError) aria-invalid="true" aria-describedby="{{ $fieldName }}-error" @endif
        class="w-full rounded-md border bg-white px-3 py-2.5 text-sm text-gray-900 shadow-sm transition placeholder:text-gray-400 focus:outline-none focus:ring-2 {{ $hasError ? 'border-red-400 focus:border-red-500 focus:ring-red-500/20' : 'border-gray-300 focus:border-brand focus:ring-brand/20' }}"
        placeholder="{{ $fieldDef['placeholder'] ?? '' }}"
        @if (isset($fieldDef['min'])) min="{{ $fieldDef['min'] }}" @endif {{ $required ? 'required' : '' }}>
@endif
@if ($hasError)
    <p id="{{ $fieldName }}-error" class="mt-1.5 text-sm text-red-700" role="alert">{{ $errors->first($fieldName) }}</p>
@endif
