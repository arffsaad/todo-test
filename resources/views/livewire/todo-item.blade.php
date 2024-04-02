<div class="@if ($todo->completed) bg-green-600 @else bg-slate-600 @endif shadow-md border-2 border-black p-2 rounded-lg font-sans text-white text-sm flex justify-between items-center text-wrap">
    <div class="group">
        <h2 @if ($todo->completed) class="line-through font-semibold" @endif>{{$todo->title}}</h2>
        <div class="hidden p-2 w-52 bg-stone-700 opacity-90 rounded-lg group-hover:block absolute">
            <span class="text-pretty">{{ $todo->description }}</span>
        </div>
    </div>
    <div class="flex gap-2">
        <button wire:click="edit" class="bg-slate-400 hover:bg-slate-300 rounded-sm"><x-typ-pencil class="w-6 h-6 text-slate-100" /></button>
        @if ($todo->completed)
            <button wire:click="toggle" class="bg-red-500 hover:bg-red-600 rounded-sm"><x-typ-arrow-back class="w-6 h-6"/></button>
        @else
            <button wire:click="toggle" class="bg-green-500 hover:bg-green-600 rounded-sm"><x-typ-tick class="w-6 h-6"/></button>
        @endif
    </div>
</div>