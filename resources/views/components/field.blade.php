<div class="field">
    <label for="{{ $id ?? '' }}" class="text-[#7F8FA4]">{{ $label ?? '' }}</label>
    
    @if ($type === 'dropdown')
        <select class="ui dropdown" name="{{ $name ?? '' }}" id="{{ $id ?? '' }}">
            {{ $slot }}
        </select>
    @else
        <input type="{{ $type ?? '' }}" name="{{ $name ?? '' }}" id="{{ $id ?? '' }}" autocomplete="off">
        
    @endif
    <span id="error_{{ $id ?? '' }}" class="text-red-600 text-sm"></span>
</div>