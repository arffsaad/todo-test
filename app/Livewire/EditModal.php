<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Todo;
use Livewire\Attributes\On;

class EditModal extends Component
{
    public $edit;
    public $title;
    public $description;
    public $id;

    public function render()
    {
        return view('livewire.edit-modal');
    }

    #[On('open-editModal')]
    public function open($todo) {
        $this->edit = true;
        $this->title = $todo['title'];
        $this->description = $todo['description'];
        $this->id = $todo['id'];
    }

    public function save() {
        $update = Todo::find($this->id);
        $update->title = $this->title;
        $update->description = $this->description;
        $update->save();
        $this->edit = false;
        $this->dispatch('refreshTodos');
    }

    public function close() {
        $this->edit = false;
    }
}
