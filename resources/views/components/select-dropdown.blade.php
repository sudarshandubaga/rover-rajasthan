<div class="select-dropdown border border-gray-300 rounded-lg relative">
    <select
        {{ $attributes->merge(['class' => 'w-full p-3 appearance-none focus:ring-roberto-teal focus:border-roberto-teal']) }}>
        {{ $slot }}
    </select>
</div>
