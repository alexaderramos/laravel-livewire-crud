<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Post as MyPost;
use Livewire\WithPagination;

class Post extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';


    protected $listeners = [
        'refreshParent'=>'$refresh'
    ];

    public function render()
    {
        return view('livewire.post', [
            'posts' => MyPost::where('user_id', Auth::id())->paginate(3)
        ]);
    }



}
