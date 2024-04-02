@section('title', 'My Todos')

<div>
    <div class="flex justify-between w-screen px-12 h-24 items-center">
        <span><h1 class="text-5xl font-bold font-sans">My Todos</h1> <h2 class="text-sm font-normal italic">(hover on todo to see descriptions)</h2></span>
        <button wire:click="$dispatch('open-createModal')" class="p-2 bg-green-600 hover:bg-green-700 rounded-lg font-bold font-sans text-white text-sm">+ New Todo</button>
    </div>
    <div class="p-4">
        <div class="grid grid-cols-4 gap-2">
            @foreach ($todos as $todo)
                <livewire:todo-item :todo="$todo" :key="$todo->id" @refreshTodos="refreshTodos" />
            @endforeach
        </div>
    </div>
    <livewire:create-modal @refreshTodos="refreshTodos" />
    <livewire:edit-modal @refreshTodos="refreshTodos" />
</div>
