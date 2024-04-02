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
        $this->todos = TodoModel::orderBy('completed', 'asc')->get();
        return view('livewire.todo', ['todos' => $this->todos]);
    }

    #[On('refreshTodos')]
    public function refreshTodos() {
        $this->todos = [];
        $this->todos = TodoModel::orderBy('completed', 'asc')->get();
        $this->dispatch('$refresh');
    }

    #[On('editModal')]
    public function edit($todo) {
        $this->dispatch('open-editModal', todo: $todo);
    }
}
