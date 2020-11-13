<?php

namespace App\Http\Livewire;

use App\Models\Post as MyPost;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

/**
 * Class PostForm
 * @package App\Http\Livewire
 */
class PostForm extends Component
{

    public $title;
    public $content;
    public $modelId;

    /**
     * Contiene los listeners
     * @var string[]
     */
    protected $listeners = [
        'getModelId'
    ];


    /**
     *
     * @param $modelId
     */
    public function getModelId($modelId){
        $this->modelId = $modelId;
        $model =  MyPost::find($this->modelId);

        $this->title = $model->title;
        $this->content = $model->content;
    }

    /**
     * Reglas de validacion
     * @var string[]
     */
    protected $rules = [
        'title' => 'required|min:10|max:20',
        'content' => 'required',
    ];

    /**
     * Funcion de renderisado
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.post-form');
    }

    /**
     * Validacion en tiempo real
     * @param $propertyName
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    /**
     *  Funcion para guardar registros
     */
    public function save()
    {
        $this->validate();
        $data = [
            'title' => $this->title,
            'content' => $this->content,
            'user_id' => Auth::id()
        ];

        /**
         * Si esta en modo edicion
         */
        if ($this->modelId){
            MyPost::find($this->modelId)->update($data);
        }else{
            /**
             * Caso contrario
             */
            MyPost::create($data);
        }

        $this->emit('refreshParent');
        $this->dispatchBrowserEvent('closeModal');
        $this->cleanVars();
    }

    /**
     * Funcion para limpiar las variables
     */
    private function cleanVars()
    {
        $this->title = null;
        $this->content = null;
        $this->modelId = null;
    }
}
