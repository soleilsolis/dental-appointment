<div class="field {{ $required ? 'required' : '' }} {{ $attributes->get('data-fieldclass') ?? '' }}" >
    <label for="{{ $attributes->get('id') ?? '' }}" class="text-[#7F8FA4]">{{ $attributes->get('label') ?? '' }}</label>
    
    @if ($attributes->get('type') === 'dropdown')
        <select class="ui dropdown" {{ $attributes }}>
            {{ $slot }}
        </select>
    @elseif ($attributes->get('type') === 'textarea')
        <textarea {{ $attributes }} class="resize-none"></textarea>

    @else
        <input {{ $attributes }}>
        
    @endif
    <span id="error_{{ $attributes->get('id') ?? '' }}" class="text-red-600 text-sm h-[15px]">&nbsp;</span>
</div>