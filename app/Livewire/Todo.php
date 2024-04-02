<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Todo as TodoModel;
use Livewire\Attributes\On;

class Todo extends Component
{
    public $todos;
    public $edit = false;
    public function render()
    {
        $this->todos = auth()->user()->todos()->orderBy('completed', 'asc')->get();
        return view('livewire.todo', ['todos' => $this->todos]);
    }

    #[On('refreshTodos')]
    public function refreshTodos() {
        $this->todos = [];
        $this->todos = auth()->user()->todos()->orderBy('completed', 'asc')->get();
        $this->dispatch('$refresh'); // trying to refresh after update, works in DB but not in FE somehow. pending fix since it's not a critical issue.
    }

    #[On('editModal')]
    public function edit($todo) {
        $this->dispatch('open-editModal', todo: $todo);
    }
}
