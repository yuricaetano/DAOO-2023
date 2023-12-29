<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roommate extends Model
{
    use HasFactory;
    protected  $table = 'roommates';
    protected $fillable =['nome', 'telefone', 'cpf', 'email'];

    public function imoveis(){
        return $this->hasMany(Imovel::class);
    }
    public function proprietarios(){
        return $this->hasMany(Proprietario::class);
    }
}
