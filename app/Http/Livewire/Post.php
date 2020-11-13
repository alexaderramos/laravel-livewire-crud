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
    public $action;
    public $selectedItem;


    protected $listeners = [
        'refreshParent' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.post', [
            'posts' => MyPost::where('user_id', Auth::id())
                ->orderBy('id', 'desc')
                ->paginate(10)
        ]);
    }

    public function delete()
    {
        MyPost::destroy($this->selectedItem);
        $this->dispatchBrowserEvent('closeDeleteModal');

    }

    public function selectItem($id, $action)
    {
        $this->selectedItem = $id;


        if ($action == 'delete') {
            $this->dispatchBrowserEvent('openDeleteModal');
        }else{
            $this->emit('getModelId', $this->selectedItem);
            $this->dispatchBrowserEvent('openModal');

        }
    }


}
