@props([
    'fieldName',
    'label' => '',
    'placeholder' => '',
    'required' => false,
    'value' => null,
    'lineNumbers' => false,
])

<div {{ $attributes }}>
    <label for="{{ $fieldName }}"
        class="block text-sm font-medium text-gray-700 mb-1">{{ $label }}{{ $required ? ' *' : '' }}</label>
    <div
        class="flex border border-gray-300 rounded focus-within:ring-2 focus-within:ring-coral focus-within:border-transparent">
        <div id="{{ $fieldName }}-line-numbers"
            class="flex flex-col items-end py-2 pr-2 pl-3 text-xs text-gray-400 select-none bg-gray-50 rounded-l border-r border-gray-300 leading-[1.5rem] {{ $lineNumbers ?: 'hidden' }}"
            aria-hidden="true"></div>
        <textarea name="{{ $fieldName }}" id="{{ $fieldName }}" rows="3"
            class="w-full border-0 rounded-r px-3 py-2 focus:outline-none focus:ring-0 focus:border-transparent resize-none leading-[1.5rem]"
            placeholder="{{ $placeholder }}" {{ $required ? 'required' : '' }}>{{ old($fieldName, $value) }}</textarea>
    </div>
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
