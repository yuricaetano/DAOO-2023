<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    use HasFactory;
    protected $fillable =['rua', 'numero', 'cidade', 'cliente_id'];

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
    public function contrato(){
        return $this->hasOne(Contrato::class);
    }

    public static function imoveisPorRua()
    {
        return self::orderBy('rua', 'asc')->get();
    }
    public static function totalImoveisPorCliente()
    {
        return self::with('cliente')
        ->select('cliente_id')
            ->selectRaw('COUNT(*) as total_imoveis')
            ->groupBy('cliente_id')
            ->get();
    }
    public static function totalImoveisPorCidade()
    {
        return self::select('cidade', \DB::raw('COUNT(*) as total_imoveis'))
            ->groupBy('cidade')
            ->get();
    }


}
