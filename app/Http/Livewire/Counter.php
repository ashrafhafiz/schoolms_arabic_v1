<?php

namespace App\Http\Livewire;

use App\Models\Level;
use Livewire\Component;

class Counter extends Component
{
    public $count = 0;

    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        $this->count--;
    }

    public $search = '';

    public function render()
    {
        return view('livewire.counter', [
            'levels' => Level::where('name->en', $this->search)->get()
        ]);
    }
}
