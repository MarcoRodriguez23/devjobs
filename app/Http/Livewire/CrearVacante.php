<?php

namespace App\Http\Livewire;

use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use App\Models\Categoria;
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

        //almacenar la imagen
        $imagen=$this->image->store('public/vacantes');
        $nombre_imagen = str_replace('public/vacantes/','',$imagen);

        //crear la vacante
        Vacante::create([
            'title'=>$datos['title'],
            'salario_id'=>$datos['salary'],
            'categoria_id'=>$datos['category'],
            'company'=>$datos['company'],
            'lastday'=>$datos['lastday'],
            'description'=>$datos['description'],
            'image'=>$nombre_imagen,
            'user_id'=> auth()->user()->id
        ]);
        //crear un mensaje 
        session()->flash('mensaje','The vacancy was created successfully');
        //redireccionar al usuario
        return redirect()->route('vacantes.index');
    }
}
