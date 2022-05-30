<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;

class PostsIndex extends Component
{
    public function render()
    {

        $posts = Post::where('user_id', auth()->user()->id)->paginate();

        return view('livewire.admin.posts-index', compact('posts'));
    }
}
