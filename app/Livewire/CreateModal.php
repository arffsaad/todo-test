<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Todo;
use Livewire\Attributes\On;

class CreateModal extends Component
{
    public $create = false;
    public $title = '';
    public $description = '';
    public function render()
    {
        return view('livewire.create-modal');
    }
    
    public function save() {
        Todo::create([
            'user_id' => auth()->id(),
            'title' => $this->title,
            'description' => $this->description,
            'completed' => false,
        ]);
        $this->create = false;
        $this->dispatch('refreshTodos');
    }

    #[On('open-createModal')]
    public function open() {
        $this->title = '';
        $this->description = '';
        $this->create = true;
    }

    public function close() {
        $this->create = false;
    }
    
}
