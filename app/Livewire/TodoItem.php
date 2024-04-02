<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Todo;

class TodoItem extends Component
{
    public $todo;
    public function render()
    {
        return view('livewire.todo-item');
    }

    public function toggle() {
        $update = Todo::find($this->todo->id);
        $update->completed = !$update->completed;
        $update->save();
        $this->todo->completed = $update->completed;
        $this->dispatch('refreshTodos');
    }

    public function edit() {
        $this->dispatch('editModal', todo: $this->todo);
    }
}
