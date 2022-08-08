<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use App\Models\Categoria;
use Livewire\WithFileUploads;

class EditarVacante extends Component
{
    public $vacante_id;
    public $title;
    public $salary;
    public $category;
    public $company;
    public $lastday;
    public $description;
    public $image;
    public $new_image;

    use WithFileUploads;

    protected $rules = [
        'title' => 'required|string',
        'salary' => 'required',
        'category' => 'required',
        'company' => 'required|string',
        'lastday' => 'required',
        'description' => 'required',
        'new_image' => 'nullable|image|max:1024'
    ];

    public function mount(Vacante $vacante)
    {
        $this->vacante_id = $vacante->id;
        $this->title = $vacante->title;
        $this->salary = $vacante->salario_id;
        $this->category = $vacante->categoria_id;
        $this->company = $vacante->company;
        $this->lastday = Carbon::parse($vacante->lastday)->format('Y-m-d');
        $this->description = $vacante->description;
        $this->image = $vacante->image;
    }

    public function editarVacante()
    {
        $datos = $this->validate();

        //revisar si hay una nueva imagen
        if($this->new_image){
            $imagen = $this->new_image->store('public/vacantes');
            $datos['image'] = str_replace('public/vacantes/','',$imagen);
        }
        //encontrar la vacante a editar
        $vacante = Vacante::find($this->vacante_id);
        
        //asignar los valores
        $vacante->title = $datos['title'];
        $vacante->salario_id = $datos['salary'];
        $vacante->categoria_id = $datos['category'];
        $vacante->company = $datos['company'];
        $vacante->lastday = $datos['lastday'];
        $vacante->description = $datos['description'];
        $vacante->image = $datos['image'] ?? $vacante->image;
        //guardar la vacante
        $vacante->save();
        //redireccionar
        session()->flash('mensaje','The vacancy was edited successfully');
        return redirect()->route('vacantes.index');
    }
    
    public function render()
    {
        $salarios = Salario::all();
        $categorias = Categoria::all();

        return view('livewire.editar-vacante',[
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}
