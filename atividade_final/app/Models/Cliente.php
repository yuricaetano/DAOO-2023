<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected  $table = 'clientes';
    protected $fillable =['nome', 'telefone', 'cpf', 'email'];

    public function imovels(){
        return $this->hasMany(Imovel::class);
    }
    public function contratos(){
        return $this->hasMany(Contrato::class);
    }
}
