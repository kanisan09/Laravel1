@props(['value'])

<label {{ $attributes->merge(['class' => 'font-medium text-sm text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>
{{-- チェックボックスの文字並びを横にするために 「(['class' => 'block font-medium 」のblockを消しました--}}