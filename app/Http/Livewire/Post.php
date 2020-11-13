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

    public $title;
    public $content;

    protected $rules = [
        'title' => 'required|min:10|max:20',
        'content' => 'required',
    ];

    public function render()
    {
        return view('livewire.post', [
            'posts' => MyPost::where('user_id', Auth::id())->paginate(3)
        ]);
    }

    /**
     * @param $propertyName
     * @throws \Illuminate\Validation\ValidationException
     * Realtime Validation
     */
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
//        $this->validate();
        $data = [
            'title' => $this->title,
            'content' => $this->content,
            'user_id' => Auth::id()
        ];

        MyPost::create($data);

        $this->cleanVars();
    }

    private function cleanVars()
    {
        $this->title = null;
        $this->content = null;
    }

}
