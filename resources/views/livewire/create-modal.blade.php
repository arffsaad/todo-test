<div class="@if(!$create) hidden @else flex @endif w-screen h-screen top-0 left-0 absolute z-20 items-center justify-center">
    <div class="bg-slate-50 p-6 shadow-xl rounded-lg relative">
        <button wire:click="close" class="absolute top-2 right-2"><x-typ-delete class="w-6 h-6" /></button>
        <form wire:submit="save">
            <div class="grid grid-cols-1 gap-y-2">
                <h3 class="text-lg font-semibold font-sans">New Todo</h3>
                    <input wire:model="title" type="text" placeholder="Title (max 25 chars)" maxlength="25" class="text-sm rounded-lg border-none">
                    <textarea wire:model="description" placeholder="Description (max 100 chars)" maxlength="100" class="text-sm rounded-lg border-none"></textarea>
                    <button type="submit" class="p-2 bg-green-600 hover:bg-green-700 font-sans text-white font-semibold w-1/2 rounded-lg justify-self-end">Create</button>
                </div>
            </div>
        </form>
    <div class="bg-white absolute w-screen h-screen opacity-80 -z-10"></div>
</div>
