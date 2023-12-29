<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    use HasFactory;
    protected $fillable =['rua', 'numero', 'cidade', 'cliente_id'];

    public function roommate(){
        return $this->belongsTo(Cliente::class);
    }
    public function proprietario(){
        return $this->hasOne(Proprietario::class);
    }

    public static function imoveisPorRua()
    {
        return self::orderBy('rua', 'asc')->get();
    }
    public static function totalImoveisPorRoommate()
    {
        return self::with('roommate')
        ->select('roommate_id')
            ->selectRaw('COUNT(*) as total_imoveis')
            ->groupBy('roommate_id')
            ->get();
    }
    public static function totalImoveisPorCidade()
    {
        return self::select('cidade', \DB::raw('COUNT(*) as total_imoveis'))
            ->groupBy('cidade')
            ->get();
    }


}
