<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    use HasFactory;

    protected $dates = ['lastday'];

    protected $fillable = [
        'title',
        'salario_id',
        'categoria_id',
        'company',
        'lastday',
        'description',
        'image',
        'user_id'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
    public function salario()
    {
        return $this->belongsTo(Salario::class);
    }
    public function candidatos()
    {
        return $this->hasMany(Candidato::class)->orderBy('created_at','DESC');
    }
    public function reclutador()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
