@props([
    'fieldName',
    'label' => '',
    'placeholder' => '',
    'required' => false,
    'value' => null,
    'lineNumbers' => false,
])

@php($hasError = isset($errors) && $errors->has($fieldName))

<div {{ $attributes }}>
    <label for="{{ $fieldName }}" class="mb-1.5 block text-sm font-medium text-gray-700">
        {{ $label }}{{ $required ? ' *' : '' }}
    </label>
    <div
        class="flex rounded-md border bg-white shadow-sm transition focus-within:ring-2 {{ $hasError ? 'border-red-400 focus-within:border-red-500 focus-within:ring-red-500/20' : 'border-gray-300 focus-within:border-brand focus-within:ring-brand/20' }}">
        <div id="{{ $fieldName }}-line-numbers"
            class="flex flex-col items-end py-2 pr-2 pl-3 text-xs text-gray-400 select-none bg-gray-50 rounded-l border-r border-gray-300 leading-[1.5rem] {{ $lineNumbers ?: 'hidden' }}"
            aria-hidden="true"></div>
        <textarea name="{{ $fieldName }}" id="{{ $fieldName }}" rows="3"
            @if ($hasError) aria-invalid="true" aria-describedby="{{ $fieldName }}-error" @endif
            class="w-full resize-none rounded-r border-0 px-3 py-2.5 text-sm leading-[1.5rem] text-gray-900 placeholder:text-gray-400 focus:outline-none focus:ring-0"
            placeholder="{{ $placeholder }}" {{ $required ? 'required' : '' }}>{{ old($fieldName, $value) }}</textarea>
    </div>
    @if ($hasError)
        <p id="{{ $fieldName }}-error" class="mt-1.5 text-sm text-red-700" role="alert">{{ $errors->first($fieldName) }}</p>
    @endif
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
