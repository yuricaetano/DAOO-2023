<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;
    protected  $table = 'contratos';
    protected $fillable =['descricao', 'valor'];

    public function imovel(){
        return $this->belongsTo(Imovel::class);
    }
    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
}
