<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Chamado extends Model
{
    use HasFactory;

    protected $fillable = [
        'descricao',
        'parecer_tec',
        'user_id',
        'tecnico_id',
        'categoria',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tecnico()
    {
        return $this->belongsTo(Tecnico::class);
    }

    public function scopeUserAuth($query)
    {
        return $query->where('user_id', Auth::user()->id);
    }
}