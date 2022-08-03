<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{
    public $title;
    public $salary;
    public $category;
    public $company;
    public $lastday;
    public $description;
    public $image;

    use WithFileUploads;

    protected $rules = [
        'title' => 'required|string',
        'salary' => 'required',
        'category' => 'required',
        'company' => 'required|string',
        'lastday' => 'required',
        'description' => 'required',
        'image' => 'required|image|max:1024'
    ];

    public function render()
    {
        $salarios = Salario::all();
        $categorias = Categoria::all();
        return view('livewire.crear-vacante',[
            'salarios'=>$salarios,
            'categorias'=>$categorias
        ]);
    }

    public function crearVacante()
    {
        $datos = $this->validate();
    }
}
