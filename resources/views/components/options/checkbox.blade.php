@props([
    'option',
    'useroptions',
])

<div class="flex row">
    <label for="" style="min-width: 12rem;">
        {{ ucwords(str_replace('_', ' ',$option->descr)) }}:
    </label>
    <div class="ml-2 flex flex-col">
        <div>
            <input type="checkbox" name="{{$option->descr}}" id="option_{{$option->id}}" value="1"
                @if($useroptions && $useroptions->where('option_id', $option->id)->first() && $useroptions->where('option_id', $option->id)->first()->value === '1') checked @endif
            />

            {{ $option->label_default }}
        </div>
        @error($option->descr)
            <div class="bg-white text-red-500 text-sm px-2">{{ $message }}</div>
        @enderror
    </div>
</div>
