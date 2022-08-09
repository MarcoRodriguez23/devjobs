<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
    public $cv;
    public $vacante;
    use WithFileUploads;

    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function mount(Vacante $vacante)
    {
        $this->vacante=$vacante;
    }
    public function apply()
    {
        $datos=$this->validate();

        //almacenar cv en disco
        $cv=$this->cv->store('public/cv');
        $datos['cv'] = str_replace('public/cv/','',$cv);
        //crear candidato a la vacante
        $this->vacante->candidatos()->create([
            'user_id'=>auth()->user()->id,
            'cv'=>$datos['cv']
        ]);
        //crear notificación
        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id,$this->vacante->title,auth()->user()->id));
        //enviar email

        //mostrar mensaje de ok
        session()->flash('mensaje','your information was sent successfully, good luck!!');
        return redirect()->back();

    }
    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
