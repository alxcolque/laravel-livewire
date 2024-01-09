<?php

namespace App\Livewire;

use Livewire\Component;

class Post extends Component
{
    public function indexMethod(){
        return view('posts');
    }
    public function render()
    {
        $data = ['uno', 'dos', 'tres'];
        return view('livewire.post', compact('data'));
    }
}
