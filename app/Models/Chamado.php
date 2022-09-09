<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;


class Chamado extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'descricao',
        'parecer_tec',
        'user_id',
        'tecnico_id',
        'categoria',
        'status',
        'ip_address',
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
        if (Auth::user()->admin == 1) {
            return $query;
        }
        return $query->where('user_id', Auth::user()->id);
    }

    public function routeNotificationForMail($notification)
    {
        return $this->user->email;
    }

    public function getChamados(string $search = null)
    {
            
        $chamados = $this->get();
        
        if ($search) {
            $chamados = $this->where('status', '!=', 'Fechado')->where(function ($query) use ($search) {
                $query->with(['user', 'tecnico'])
                    ->where('descricao', 'LIKE', "%$search%")
                    ->orWhere('titulo', 'LIKE', "%$search%")
                    ->orWhere('categoria', 'LIKE', "%$search%")
                    ->orWhere('parecer_tecnico', 'LIKE', "%$search%")
                    ;
            })->get();
        }
        return $chamados;
    }   
}