<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LikeCount extends Component
{
    public $post;
    public $likes;

    public function count(){
        $this->likes = $this->post->likes->count();
    }

    public function render()
    {
        return view('livewire.like-count');
    }
}
