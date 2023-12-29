<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;
    protected $fillable =['tipo', 'valor', 'imovel_contrato', 'cliente_contrato'];
}

