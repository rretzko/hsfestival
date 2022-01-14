@props([
    'val' => 'Submit',
])
<div class="flex justify-end pr-4">
    <button type="submit"
            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 rounded-md bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            style="color: black;"
    >
        {{ $val }}
    </button>
</div>
