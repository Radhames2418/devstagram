<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LikePost extends Component
{
    public $post;
    public $isLiked;



    public function mount()
    {
        $this->isLiked = $this->post->checkLike(auth()->user());
        return $this->isLiked;
    }

    public function like()
    {
        if ($this->post->checkLike(auth()->user())){
            $this->post->likes()->where('post_id', $this->post->id)->delete();
            $this->isLiked = false;
        } else {
            $this->post->likes()->create([
                'user_id' => auth()->user()->id
            ]);
            $this->isLiked = true;
        }
    }

    public function render()
    {
        return view('livewire.like-post');
    }
}
